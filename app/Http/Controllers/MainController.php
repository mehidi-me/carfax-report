<?php

namespace App\Http\Controllers;

use App\Models\VinList;
use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{

    //
    public function searchVin(Request $request)
    {
        $data = VinList::where('vin', $request->vin_input)->first();
        if ($data) {
            return response()->json(['vin' => $request->vin_input, 'status' => true]);
        } else {
            $html = $this->getVin($request->vin_input);
            if (!empty($html)) {




                $dom = new \DOMDocument();
                libxml_use_internal_errors(true); // Suppress warnings due to malformed HTML
                $dom->loadHTML($html);
                
                // Inject a script to hide the elements dynamically on the client-side
                $script = $dom->createElement('script', '
                    document.addEventListener("DOMContentLoaded", function() {
                        const observer = new MutationObserver(function(mutations) {
                            mutations.forEach(function(mutation) {
                                mutation.addedNodes.forEach(function(node) {
                                    if (node.nodeType === 1) {
                                        if (node.classList.contains("print-only-report-provided-by-snackbar") || 
                                            node.classList.contains("report-provided-by-snackbar") || 
                                            node.classList.contains("report-provided-by")) {
                                            node.style.display = "none";
                                        }
                                    }
                                });
                            });
                        });
                
                        observer.observe(document.body, { childList: true, subtree: true });
                
                        // Hide initially existing elements
                        document.querySelectorAll(".print-only-report-provided-by-snackbar, .report-provided-by-snackbar, .report-provided-by").forEach(function(el) {
                            el.style.display = "none";
                        });
                    });
                ');
                
                // Append the script to the <body> or <head>
                $body = $dom->getElementsByTagName('body')->item(0);
                $body->appendChild($script);
                
                // Save the modified HTML
                $modifiedHtml = $dom->saveHTML();
                
                // Return the modified HTML
               // return $modifiedHtml;
                
                





                Pdf::html($modifiedHtml)->save('pdf/' . $request->vin_input . '.pdf');
                VinList::create([
                    "vin" => $request->vin_input,
                    "file" => 'pdf/' . $request->vin_input . '.pdf'
                ]);
                return response()->json(['vin' => $request->vin_input, 'status' => true]);
            }
        }

        return response()->json(['status' => false]);
    }

    public function getVin($vin)
    {
        // API endpoint
        $url = "https://dealers.carfax.com/api/vhr/{$vin}";
        $auth = env('CARFAX_AUTH_TOKEN');
        // API request with headers
        $response = Http::withHeaders([
            'accept' => 'application/json, text/plain, */*',
            'accept-language' => 'en-US,en-GB;q=0.9,en;q=0.8',
            'authorization' => "Bearer {$auth}",
            'priority' => 'u=1, i',
            'sec-ch-ua' => '"Chromium";v="128", "Not;A=Brand";v="24", "Google Chrome";v="128"',
            'sec-ch-ua-mobile' => '?0',
            'sec-ch-ua-platform' => '"Windows"',
            'sec-fetch-dest' => 'empty',
            'sec-fetch-mode' => 'cors',
            'sec-fetch-site' => 'cross-site',
            'Referer' => 'https://www.carfaxonline.com/',
            'Referrer-Policy' => 'strict-origin-when-cross-origin',
        ])->get($url);

        // Check if the response is valid
        if ($response->failed() || !$response->json('vhrHtml')) {
            return '';
        }

        $vhrHtml = $response->json('vhrHtml');
        return $vhrHtml;
        // You can manipulate the response here or return it directly.
        // Example: You can return the HTML content or generate a PDF

        // For now, we simply return the HTML data as a response
        // return response()->json(['vhrHtml' => $vhrHtml]);
    }
}
