const images = ['Pictures/img1.jpg', 'Pictures/img2.jpg', 'Pictures/img3.jpg', 'Pictures/img4.jpg', 'Pictures/img5.jpg'];
let index = 0;
//calls the function display with index 0 so that the intialli image is displayed 
display(index);

function display(index) {
    //gets the the HTML tag where image will be displayed
    const imageContainer = document.getElementById('imageContainer');
    const imageUrl = images[index];//gets the image from array images
    imageContainer.innerHTML = `<img src="${imageUrl}" alt="Image ${index + 1}">`;//display that image in the HTML tag imagecontainer
}

function displayNext() {
    //will increse index by one so that next image is placed 
    index = (index + 1) % images.length;
    display(index); //calls the display function with the updated index
}

const next = document.getElementById('imageContainer');
//addidng an event listner when the imagecontainer in clicked this will call the display function
next.addEventListener('click', displayNext);

// Select the first <form> element in the document and assign it to the variable 'form'
const form = document.querySelector('form');
//when the form is submitted it will call the function submit
form.addEventListener('submit', submit);
function submit(event) {
    event.preventDefault();//prevents the form to sumbit as there is on code to handel that 
    // Retrieve values from input elements
    const name = document.getElementById('name').value;
    const number = document.getElementById('tel').value;
    const email = document.getElementById('email').value;
    const area = document.getElementById('area').value;

    // Combine the information into a stringn
    const message = 'Name: ' + name + '\n' +
        'Phone Number: ' + number + '\n' +
        'Email: ' + email + '\n' +
        'Area: ' + area;

    // Display the alert box with the information
    alert(message);
}
//gets the current year using JQuerry and display it in the HTML
$('#currentYear').text(new Date().getFullYear()); 
