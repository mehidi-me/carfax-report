<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction History') }}
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <a href="{{url('/')}}" style="    display: block;
    padding: 10px 0;"><div class="inline-flex items-center px-4 py-2 my-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Search Report</div></a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div> --}}
            <table id="myTable">
                {{-- $table->string('user_id');
                $table->string('type');
                $table->string('amount');
                $table->string('method');
                $table->string('details')->nullable(); --}}
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Details</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @php

                        $transaction_historys = \App\Models\TransactionHistory::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')
                        ->get();
                        $id = 1;
                    @endphp

                    @foreach ($transaction_historys as $transaction_history)
                        <tr>
                            <td>{{$id++}}</td>
                            <td>{{$transaction_history->type}}</td>
                            <td>{{number_format($transaction_history->amount,2)}}$</td>
                            <td>{{$transaction_history->method}}</td>
                            <td>{{$transaction_history->details}}</td>
                            
                            <td>{{$transaction_history->updated_at}}</td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

<script>
    let table = new DataTable('#myTable', {
        // config options...
    });
</script>
