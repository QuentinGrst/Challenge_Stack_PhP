async function uploadFile() {
    let formData = new FormData();  
    let fileinput = document.querySelector(".product-file input");       
    formData.append("file", fileinput.files[0]);
    fetch('/Product/Picture', {
      method: "POST", 
      body: formData
    })
    .then(result => result.json())
    .then(data => {
        document.querySelector(".product-file .label").remove();
        document.querySelector(".product-file .picture").src=data.url;
        document.querySelector(".product-file .picture").classList.add("show");
        document.querySelector('.product-file [name="picture"]').value = data.url;
    })
}

document.querySelector(".product-file input").addEventListener("change",function(){
    uploadFile();
});