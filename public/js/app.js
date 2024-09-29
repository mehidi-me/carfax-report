let totalPoints = 0; // Variable to track total points
let successfulTaps = 0; // Track successful taps
let missedTaps = 0; // Track missed taps
let wrongTaps = 0; // Track wrong taps
let activeDiv = null; // Track the active div
const switchInterval = 1300; // Interval for switching images
let wholeDivs = document.querySelectorAll(".whole"); // Assuming these are your divs
let switchIntervalId;

// Function to update the points displayed in the "Top Tepa Orders" card
function updatePointsDisplay() {
  const pointsDisplay = document.querySelector(".coin h2"); // Target the points display element
  pointsDisplay.textContent = totalPoints.toLocaleString(); // Update with formatted points
}

// Function to update the tap rating progress bar
function updateTapRating() {
  const totalTaps = successfulTaps + missedTaps + wrongTaps;
  let ratingPercentage = 0;

  if (totalTaps > 0) {
    ratingPercentage = (successfulTaps / totalTaps) * 100; // Calculate success rate
  }

  const progressBar = document.querySelector(".progress");
  progressBar.style.setProperty("--w", `${ratingPercentage}%`); // Update width of progress bar

  // Change the color based on the rating percentage
  if (ratingPercentage < 70) {
    progressBar.style.backgroundColor = "var(--alert)"; // Set alert color if below 70%
  } else {
    progressBar.style.backgroundColor = ""; // Reset to default color
  }
}

// Function to clear content from the div
function clearDivContent(div) {
  div.innerHTML = ""; // Clear previous content
  div.removeAttribute("data-client"); // Clear the data-client attribute
}

// Function to create the image element based on selected client
function createImageElement(selectedClient) {
  const imgDiv = document.createElement("div");
  imgDiv.className = "anim-img";
  const imgElement = document.createElement("img");
  imgElement.src = selectedClient.imageSrc; // Assuming the image source is in selectedClient
  imgDiv.appendChild(imgElement);
  return imgDiv;
}

// Function to create the order text element
function createOrderText(selectedClient) {
  const orderText = document.createElement("p");
  orderText.textContent = selectedClient.orders; // Assuming orders is in selectedClient
  return orderText;
}

// Function to randomly select a client based on weighted probabilities
function selectRandomClient() {
  const rand = Math.random();
  if (rand < 0.7) {
    return {
      clientType: "good",
      orders: "+20 Orders",
      imageSrc: "images/client.png",
    }; // Good client
  } else if (rand < 0.8) {
    return {
      clientType: "good",
      orders: "+30 Orders",
      imageSrc: "images/client3.png",
    }; // Good client
  } else {
    return {
      clientType: "bad",
      orders: "-20 Orders",
      imageSrc: "images/client2.png",
    }; // Bad client
  }
}

// Function to handle missed taps
function handleMissedTap(selectedClient) {
  // Increment missed taps only for non-bad clients
  if (selectedClient.clientType === "good") {
    missedTaps++; // Increment missed taps for good clients
    updateTapRating(); // Update the tap rating on miss
  }
}

// Function to randomly switch the image between divs
function switchImage() {
  // Clear the currently active div content when switching
  if (activeDiv) {
    clearDivContent(activeDiv); // Clear image and text from previous active div
  }

  // Select a random div and a client based on weighted probabilities
  const randomDivIndex = Math.floor(Math.random() * wholeDivs.length);
  const selectedClient = selectRandomClient();

  const selectedDiv = wholeDivs[randomDivIndex]; // Define selectedDiv here

  // Create the image element without the text
  const animImgDiv = createImageElement(selectedClient);

  // Insert the image element into the randomly selected div
  selectedDiv.appendChild(animImgDiv);

  // Set the data-client attribute to match the client type (for CSS styling)
  selectedDiv.setAttribute("data-client", selectedClient.clientType);

  activeDiv = selectedDiv; // Set this div as the active one

  // Add a click event listener to the image in the active div
  const imgElement = selectedDiv.querySelector("img");
  if (imgElement) {
    imgElement.addEventListener("click", function () {
      // When the image is clicked, add the text under the image
      if (!selectedDiv.querySelector("p")) {
        const orderText = createOrderText(selectedClient);
        selectedDiv.appendChild(orderText);

        // Handle points and taps based on the selected client type
        if (selectedClient.clientType === "good") {
          totalPoints += selectedClient.orders === "+20 Orders" ? 20 : 30; // Adjust points accordingly
          successfulTaps++; // Increment successful taps
        } else if (selectedClient.clientType === "bad") {
          totalPoints -= 20; // Deduct points for bad client
          wrongTaps++; // Increment wrong taps
          // Do not increment missedTaps for bad clients
        }

        updatePointsDisplay(); // Update the displayed points
        updateTapRating(); // Update the tap rating
      }
    });
  }

  // Set a timeout to clear the content of the div after the interval (1.5s)
  setTimeout(() => {
    clearDivContent(selectedDiv);
    // Call the missed tap function when the time ends
    handleMissedTap(selectedClient); // Call the function to handle missed tap
  }, switchInterval);
}

// Start switching the image between divs every 1.5 seconds
//setInterval(switchImage, switchInterval);

// cowndown

document.getElementById("startButton").addEventListener("click", function () {
  document.querySelector('.start').style.display = 'none';
  var counter = 3;

  var timer = setInterval(function () {
    var countdown = document.getElementById("countdown");
    if (countdown) {
      countdown.remove();
      
    }
    if(counter == 0){
      switchIntervalId = setInterval(switchImage, switchInterval);
    }

    countdown = document.createElement("span");
    countdown.id = "countdown";
    countdown.innerHTML = counter === 0 ? "Top Tepa!" : counter;
    document.querySelector(".cowndown-main").appendChild(countdown);

    setTimeout(() => {
      if (counter > -1) {
        countdown.style.fontSize = "40vw";
        countdown.style.opacity = 0;
      } else {
        countdown.style.fontSize = "10vw";
        countdown.style.opacity = 1;
      }
    }, 20);

    counter--;

    // When the counter reaches -1, remove the countdown element after showing "Top Tepa!"
    if (counter === -1) {
      clearInterval(timer);
      setTimeout(function () {
        countdown.remove();
      }, 1000); // Adjust this delay as needed
    }
  }, 1000);
});






// Function to refresh the game state
function refreshGame() {
  
  successfulTaps = 0; // Reset successful taps
  missedTaps = 0; // Reset missed taps
  wrongTaps = 0; // Reset wrong taps
  activeDiv = null; // Reset the active div

  // Clear all divs
  wholeDivs.forEach(div => clearDivContent(div)); // Clear content from all divs


}

// Show the start class and refresh game after 1 minute
setTimeout(() => {
  document.querySelector('.start').style.display = 'flex';
  document.getElementById("startButton").innerHTML = "Start Again";
  clearInterval(switchIntervalId); // Stop the image switching
  refreshGame(); // Refresh the game state
}, 60000); // 60000 milliseconds = 1 minute