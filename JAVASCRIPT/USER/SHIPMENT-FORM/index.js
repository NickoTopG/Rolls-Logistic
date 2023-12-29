// AVOID FORM RESUBMISSION
document.addEventListener('DOMContentLoaded', function() {
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
})
// CALCULATOR CUSTOM
let selectedOptionLabel = document.getElementById('selected-option');
let optionLabels = document.querySelectorAll('.custom-select-options .delicate-type');
let customSelect = document.getElementById('custom-select');
let customSelectOptions = document.querySelector('.custom-select-options');

customSelect.addEventListener('click', function () {
    customSelectOptions.style.display = (customSelectOptions.style.display === 'flex') ? 'none' : 'flex';
});

optionLabels.forEach(function (label) {
    label.addEventListener('click', function () {
        let selectedValue = label.getAttribute('value');
        selectedOptionLabel.setAttribute('value', selectedValue);
        selectedOptionLabel.textContent = label.textContent;
    });
});

document.body.addEventListener('click', function (event) {
    if (!customSelect.contains(event.target)) {
        customSelectOptions.style.display = 'none';
    }
});

// CALCULATE BUTTON
// Function to calculate total price based on declared weight and delicate type
function calculateTotalPrice() {
    let itemWeight = parseFloat(document.getElementById('item-weight').value);
    let delicateType = selectedOptionLabel.getAttribute('value');
    let totalPrice = 0;

    if (delicateType === 'Sturdy') {
        // Sturdy type pricing
        totalPrice = itemWeight * 45;
    } else if (delicateType === 'Fragile') {
        // Fragile type pricing
        totalPrice = itemWeight * (45 + 15);
    }

    // Display the calculated total price
    document.getElementById('display-full-price').textContent = totalPrice.toFixed(2);
    document.getElementById('display-full-price1').textContent = totalPrice.toFixed(2);
}

// Event listener for the "Help me calculate" button
document.getElementById('calculate-button').addEventListener('click', function () {
    calculateTotalPrice(); // Call the calculation function
});







/*BOOK VALidation*/
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('booking-form').addEventListener('submit', function (event) {
        console.log('Form submitted')
        let hasError = false;
        //inputs
        let declaredItem = document.getElementById('declared-items');
        let declaredWeight = document.getElementById('declared-weight')
        let declaredDelicate =document.getElementById('declared-delicate');
        let declaredPackage = document.getElementById('declared-package');
        let modeTransport = document.getElementById('mode-transpo')
        let pickupCountry = document.getElementById('pickup-country');
        let pickupAddress = document.getElementById('pickup-address');
        let deliveryCountry = document.getElementById('delivery-country');
        let deliveryAddress = document.getElementById('delivery-address');
        let declaredDeparture = document.getElementById('declared-departure');
        let declaredArrival = document.getElementById('declared-arrival');

        // current date
        const currentDate = new Date().toISOString().split('T')[0];
        
        //error prompts
        let errorDeclaredWeight = document.getElementById('error-declared-weight');
        let errorDeclaredItems = document.getElementById('error-declared-items');
        let errorDeclaredDelicate = document.getElementById('error-declared-delicate');
        let errorDeclaredPackage = document.getElementById('error-declared-package');
        let errorModeTranspo = document.getElementById('error-mode-transpo');
        let errorPickupCountry = document.getElementById('error-pickup-country');
        let errorPickupAddress = document.getElementById('error-pickup-address');
        let errorDeliveryCountry = document.getElementById('error-delivery-country');
        let errorDeliveryAddress = document.getElementById('error-delivery-address');
        let errorDeclaredDeparture = document.getElementById('error-declared-departure');
        let errorDeclaredArrival = document.getElementById('error-declared-arrival');



        // validation styles & prevent default
        function validationEvent(input, message, errorMessage) {
            input.style.border = '1px solid rgb(240, 66, 66)';
            input.style.boxShadow = "none";
            message.textContent = errorMessage;
            hasError = true;
            return { input, message };
        }
        function removeValidationEvent(input, message) {
            input.style.border = '1px solid lightgray';
            message.textContent = '';
            scrollTo(input)
            return { input, message };

        }
        // invalid hover 
        function scrollTo(input) {
            if (input.value.trim() === '') {
                input.focus();
                setTimeout(() => {
                    window.scrollTo({
                        top: input.offsetTop - 600,
                        behavior: 'smooth'
                    });
                }, 100); 
            }
        }
        
        if (declaredItem.value.trim() === '') {
            const { input } = validationEvent(declaredItem, errorDeclaredItems, 'Declared items must not be empty');
            
            scrollTo(input);
        } else {
            removeValidationEvent(declaredItem, errorDeclaredItems)
        }
    
        if(declaredWeight.value.trim() === "") {
            const { input } = validationEvent(declaredWeight, errorDeclaredWeight, 'Declared weight must not be empty.');
    
            scrollTo(input);
        }  else {
            removeValidationEvent(declaredWeight, errorDeclaredWeight)
        }
    
        if(declaredDelicate.selectedIndex < 1) {
            const {input} = validationEvent(declaredDelicate, errorDeclaredDelicate, 'Declared delicate must pick atleast one.');
          
            scrollTo(input);
        } else {
            removeValidationEvent(declaredDelicate, errorDeclaredDelicate)
        }
    
        if(declaredPackage.selectedIndex < 1) {
            const {input} = validationEvent(declaredPackage, errorDeclaredPackage, 'Declared package must pick atleast one.');
            
            scrollTo(input);
        } else {
            removeValidationEvent(declaredPackage, errorDeclaredPackage)
        }

        if(pickupCountry.selectedIndex < 1) {
            const {input} = validationEvent(pickupCountry, errorPickupCountry, 'Must pick atleast country one.');
          
            scrollTo(input);
        } else {
            removeValidationEvent(pickupCountry, errorPickupCountry)
        }
    
        if(modeTransport.selectedIndex < 1) {
            const {input} = validationEvent(modeTransport, errorModeTranspo, 'Must pick atleast mode of transport one.');
          
            scrollTo(input);
        } else {
            removeValidationEvent(modeTransport, errorModeTranspo)
        }

        if(pickupAddress.value.trim() === "") {
            const {input} = validationEvent(pickupAddress, errorPickupAddress, 'Must not be empty.');
          
            scrollTo(input);
        } else {
            removeValidationEvent(pickupAddress, errorPickupAddress)
        }

        if(deliveryCountry.selectedIndex < 1) {
            const {input} = validationEvent(deliveryCountry, errorDeliveryCountry, 'Must pick atleast country one.');
          
            scrollTo(input);
        } else {
            removeValidationEvent(deliveryCountry, errorDeliveryCountry)
        }

        if(deliveryAddress.value.trim() === "") {
            const {input} = validationEvent(deliveryAddress, errorDeliveryAddress, 'Must not be empty.');
          
            scrollTo(input);
        } else {
            removeValidationEvent(deliveryAddress, errorDeliveryAddress)
        }

        if (declaredDeparture.value.trim() === "") {
            const { input } = validationEvent(declaredDeparture, errorDeclaredDeparture, 'Must set an departure date.');
            scrollTo(input);
        } else {
            removeValidationEvent(declaredDeparture, errorDeclaredDeparture);
        }

        if (declaredArrival.value.trim() === "") {
            const { input } = validationEvent(declaredArrival, errorDeclaredArrival, 'Must set an arrival date.');
            scrollTo(input);
        } 
        else if(declaredArrival.value.trim() <= currentDate) {
            const { input } = validationEvent(declaredArrival, errorDeclaredArrival, 'Must pick a date after the current date.');
            scrollTo(input);

        } else {
            removeValidationEvent(declaredArrival, errorDeclaredArrival);
        }
        
        if(hasError) {
            console.log('Stoped')
            event.preventDefault();
        } else {
            
        }
    });
});

        // AVOID FORM RESUBMISSION
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }


        // Total custom total price


  var label = document.getElementById('display-full-price1');
    var input = document.getElementById('shipment-price1');

    // Set the initial value of the input to the current value of the label
    let newValue =  input.value = label.textContent;
    console.log(newValue);

    // Function to update the label content based on the input value
    function updateLabelContent() {
        label.innerText = input.value;
    }

    // Function to update the input value based on the label content
    function updateInputValue() {
        input.value = label.textContent;
    }

    // Call the functions initially
    updateInputValue();

    // Example: Change the label content dynamically after 2 seconds
    setTimeout(function() {
        input.value = "420";  // Update the input value
        updateLabelContent();  // Update the label content based on the new input value
        updateInputValue();    // Update the input value based on the label content
    }, 2000);