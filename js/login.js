//montrer le mdp

const input = document.getElementById("input") ;
const span = document.getElementById("display");
document.getElementById('display').addEventListener('mouseup',
function(){
        input.type= 'password';
  }
)
document.getElementById('display').addEventListener('mousedown',
function(){
        input.type='text';
}
)