const formulario1 = document.getElementById('formulario-voluntario');
const campos = document.querySelectorAll('.required');
const spans = document.querySelectorAll('.span-required');
const nameRegex = /^[a-zA-ZÀ-ÿ\s'´`~]{3,}$/;
const emailRegex = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
/*const foneRegex = /^\(\d{2}\)\s*\d{4,5}-?\d{4}$/;
const dateRegex = /^(0?[1-9]|[12][0-9]|3[01])\/(0?[1-9]|1[0-2])\/\d{4}$/;*/

function validateRequiredFields() {
    let allFieldsFilled = true;
    for (let i = 0; i < campos.length; i++) {
      if (campos[i].value.trim() === '') {
        setError(i);
        allFieldsFilled = false;
      } else {
        removeError(i);
      }
    }
    return allFieldsFilled;
  }

function setError(index, message) {
    console.log('setError');
    campos[index].style.borderBottom = '1px solid #e63636';
    spans[index].textContent = message;
    spans[index].style.display = 'block';
    spans[index].style.position = "absolute";
    spans[index].style.top = "4.6rem";
    spans[index].style.fontFamily = "poppins, sans-serif";
    spans[index].style.fontSize = "12px";
    spans[index].style.fontWeight = "400";
    spans[index].style.color = "red";
    
}


function removeError(index) {
    console.log('removeError');
    campos[index].style.borderBottom = '';
    spans[index].style.display= 'none';

}


function nameValidate() {
    console.log('nameValidate');
    if (campos[0].value.length < 3) {
    setError(0, 'Mínimo de três caracteres');
    return false;
    } else if (!nameRegex.test(campos[0].value)) {
    setError(0, 'Insira apenas letras');
    return false;
    } else {
    removeError(0);
    return true;
    }
}


// function dateValidate() {
//     console.log('dateValidate');
//     if (!dateRegex.test(campos[1].value)) {
//     setError(1, 'Data de nascimento inválida');
//     return false;
//     } else {
//     removeError(1);
//     return true;
//     }
// }


function validateCPF(cpf) {
    cpf = cpf.replace(/\D/g, ''); // remove todos os caracteres não numéricos
    if (cpf.length !== 11) return false;

    let sum = 0;
    for (let i = 0; i < 9; i++) {
    sum += parseInt(cpf.charAt(i)) * (10 - i);
    }
    let remainder = (sum * 10) % 11;
    let digit1 = remainder === 10 ? 0 : remainder;

    sum = 0;
    for (let i = 0; i < 10; i++) {
    sum += parseInt(cpf.charAt(i)) * (11 - i);
    }
    remainder = (sum * 10) % 11;
    let digit2 = remainder === 10 ? 0 : remainder;

    return (parseInt(cpf.charAt(9)) === digit1 && parseInt(cpf.charAt(10)) === digit2);
}


function cpfValidate() {
    console.log('cpfValidate');
    const cpf = campos[2].value;

    if (!validateCPF(cpf)) {
    setError(2, 'Cpf Inválido');
    return false;
    } else {
    removeError(2);
    return true;
    }
}

// function foneValidate() {
//     console.log('foneValidate');
    
//     if (!foneRegex.test(campos[3].value)) {
//     setError(3, 'Telefone inválido');
//     return false;
//     } else {
//     removeError(3);
//     return true;
//     }
// }

// function foneOpcValidate() {
//     console.log('foneOpcValidate');
//     if (!foneRegex.test(campos[4].value)) {
//     setError(4, 'Telefone inválido');
//     return false;
//     } else {
//     removeError(4);
//     return true;
//     }
// }

function emailValidate() {
    console.log('emailValidate');
    if (!emailRegex.test(campos[5].value)) {
    setError(3, 'Email inválido');
    return false;
    } else {
    removeError(3);
    return true;
    }
}


function passwordValidate() {
    console.log('passwordValidate');
    const senha = campos[4].value;
    const digitRegex = /\d/;
    const specialRegex = /[!@#$%&*]/;
    const upperRegex = /[A-Z]/;

    if (senha.length < 6) {
    setError(4, 'A senha deve ter pelo menos 6 caracteres');
    return false;
    }

    if (!digitRegex.test(senha)) {
    setError(4, 'A senha deve conter pelo menos um número');
    return false;
    }

    if (!specialRegex.test(senha)) {
    setError(4, 'A senha deve conter pelo menos um caractere especial (!@#$%&*)');
    return false;
    }

    if (!upperRegex.test(senha)) {
    setError(4, 'A senha deve conter pelo menos uma letra maiúscula');
    return false;
    }

    removeError(4);
    return true;
}

    
    function confirmPassword() {
    console.log('confirmPassword');
    const senha = campos[4].value;
    const confSenha = campos[5].value;
    
    // Verifica se as senhas são iguais
    if (senha !== confSenha) {
        setError(4, 'As senhas não coincidem');
        return false;
    } else {
        removeError(5);
        return true;
    }
    }


    formulario1.addEventListener('submit', function(event) {
        // Previne o envio do formulário por padrão
        event.preventDefault();
        
        // Verifica se os campos obrigatórios foram preenchidos corretamente
        const nameValid = nameValidate();
        const dateValid = dateValidate();
        const cpfValid = cpfValidate();
        const foneValid = foneValidate();
        const emailValid = emailValidate();
        const passwordValid = passwordValidate();
        const confirmPasswordValid = confirmPassword();
      
        if (nameValid && dateValid && cpfValid && foneValid && emailValid && passwordValid && confirmPasswordValid) {
          // Se todos os campos estiverem válidos, envia o formulário
          formulario1.submit();
        } else {
          // Caso contrário, exibe uma mensagem de erro e destaca os campos com erro
          nameValidate();
          cpfValidate();
          emailValidate();
          passwordValidate();
          confirmPassword();
        }
      });
      