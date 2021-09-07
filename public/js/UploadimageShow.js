
function ShowNumberPhone() {
    var phoneNumber = document.querySelector('.phoneNumber');
    var Message = document.querySelector('#Message');

    Message.classList.remove('MessageActive');

    if (phoneNumber.className == "phoneNumber") {
        phoneNumber.classList.add("number");
    } else {
        phoneNumber.classList.remove("number");
    }

}

function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("uploadPhoto").files[0]);

    oFReader.onload = function (oFREvent) {
        document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
};

function ShowSendMessage() {
    var ShowMessage = document.querySelector('.Message');
    var Phone = document.querySelector('#phoneNumber');

    Phone.classList.remove('number');

    if (ShowMessage.className == "Message") {
        ShowMessage.classList.add("MessageActive");
    } else {
        ShowMessage.classList.remove("MessageActive");
    }
}
