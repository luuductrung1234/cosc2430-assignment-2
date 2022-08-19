// declare elements
const imgDiv = document.querySelector('.profile-div');
const img = document.querySelector('#photo');
const file = document.querySelector('#file');
const uploadBtn = document.querySelector('#upload-button');

//user hover over image

imgDiv.addEventListener('mouseenter', function () {
    uploadBtn.style.display = "block";
});

//no hover

imgDiv.addEventListener('mouseleave', function () {
    uploadBtn.style.display = "none";
});

//choose file

file.addEventListener('change', function () {

    const choosedFile = this.files[0];

    if (choosedFile) {

        const reader = new FileReader(); 

        reader.addEventListener('load', function () {
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(choosedFile);
    }
});