// const form = document.querySelector("form");
//    const email = document.getElementById("email");
//    const pass = document.getElementById("pass");
//    const btn = document.querySelector(".sign");
//    let arr=[];
//    form.addEventListener('submit' , (e) =>{
//     checkInputs();

//     if(arr.length != 4) e.preventDefault();
//    });
//    function checkInputs() {
//     const emailValue = email.value.trim();
//     const passValue = pass.value.trim();

//     if(emailValue === ''){
//         setErrorFor(email, 'email cannot be blank');
//     } else if (!isEmail(emailValue)){
//         setErrorFor(email, "Not a valid email")
//     }
//     else{
//         setSuccessFor(email, "good");
//         arr.push(true);
//     }
//     if(passValue === ''){
//         setErrorFor(pass, 'pass cannot be blank');
//     }else if(!ispass(passValue)){
//         setErrorFor(pass, "Not a valid pass")
//     }
//     else{
//         setSuccessFor(pass, "good");
//         arr.push(true);
//     }
    
//     }

//     function validateemail(){
//     if(email.value.trim() === ''){
//         setErrorFor(email, 'email cannot be blank');
//     } else if (!isEmail(email.value.trim())){
//         setErrorFor(email, "Not a valid email");
//     }
//     else{
//         setSuccessFor(email, "good");
//     }
// }
//     function validatepass (){
//     if(pass.value.trim() === ''){
//         setErrorFor(pass, 'pass cannot be blank');
//     }else if(!ispass(pass.value.trim())){
//         setErrorFor(pass, "Not a valid pass");
//     }
//     else{
//         setSuccessFor(pass, "good");
//     }
// }
// email.addEventListener('keyup',function () {
//     validateemail()
    
// })
// pass.addEventListener('keyup',function () {
//     validatepass()
    
// })


// function setErrorFor(theinput, message){
//     theinput.closest(".form").querySelector('small').innerText = message ;
//     console.log(theinput.closest(".form"));
//     theinput.closest(".form").querySelector('small').style="visibility:visible";
//     theinput.closest(".form").className="form error";
// }
// function setSuccessFor(theinput, message){
//     theinput.closest(".form").querySelector('small').innerText = message ;
//     theinput.closest(".form").querySelector('small').style="visibility:visible";
//     theinput.closest(".form").className="form success";
// }

// function isEmail(email) {
//     return /^\w+([\.-]?\w+)*@*(gmail)*(\.ma)+$/.test(email);
//   }