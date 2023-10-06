const getLocation = document.getElementById("getlocation");

getLocation.addEventListener('click', evt=>{
    if('geolocation' in navigator){
        navigator.geolocation.getCurrentPosition(position=>{
         let latitude = position.coords. latitude;
         let longitude = position. coords. longitude;

            console. log(latitude, longitude);
        },error=>{
        console.log(error.code);
        });
    }else{
        console.log("Not Supported");
    }
});

const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
const appendAlert = (message, type) => {
  const wrapper = document.createElement('div')
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible" role="alert">`,
    `   <div>${message}</div>`,
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
    '</div>'
  ].join('')

  alertPlaceholder.append(wrapper)
}

const alertTrigger = document.getElementById('liveAlertBtn')
if (alertTrigger) {
  alertTrigger.addEventListener('click', () => {
    appendAlert('Nice, you triggered this alert message!', 'success')
  })
}

// Get references to the button and message div
const panicButton = document.getElementById('panicButton');
const messageDiv = document.getElementById('message');

// Function to be triggered when the panic button is clicked
function triggerPanic() {
    // You can customize this function to perform any action you need in an emergency
    // For this example, we'll simply display a message
    messageDiv.textContent = 'Emergency alert triggered! Please seek assistance immediately.';
    messageDiv.style.color = 'red';
    
    // You can also call emergency services or perform other actions here
    // For example: callEmergencyServices();
}

// Add a click event listener to the panic button
panicButton.addEventListener('click', triggerPanic);
