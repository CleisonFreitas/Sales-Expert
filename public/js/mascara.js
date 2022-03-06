// Mask Money
$(function() {
    $('#valor').maskMoney(),
    $('#desconto').maskMoney();
    $('#valorMaior').maskMoney();
    $('#valorMenor').maskMoney();
  })

// Calcular valor de Serviço automaticamente
String.prototype.formatMoney = function() {
    var v = this;

    if(v.indexOf('.') === -1) {
        v = v.replace(/([\d]+)/, "$1,00");
    }

    v = v.replace(/([\d]+)\.([\d]{1})$/, "$1,$20");
    v = v.replace(/([\d]+)\.([\d]{2})$/, "$1,$2");
    v = v.replace(/([\d]+)([\d]{3}),([\d]{2})$/, "$1.$2,$3");

    return v;
};
String.prototype.toFloat = function() {
    var v = this;

    if (!v) return 0;
    return parseFloat(v.replace(/[\D]+/g, '' ).replace(/([\d]+)(\d{2})$/, "$1.$2"));
};
(function(){
    "use strict";
    var $chs = document.querySelectorAll('input[name="services"]'),
        $result = document.getElementById('valor'),
        chsArray = Array.prototype.slice.call($chs);

    chsArray.forEach(function(element, index, array){
        element.addEventListener("click", function(){
            var v = this.value,
                result = 0;
            v = v.toFloat();

            if (this.checked === true) {
                result = $result.value.toFloat() + parseFloat(v);
            } else {
                result = $result.value.toFloat() - parseFloat(v);
            }

            $result.value = "R$ " + String(result).formatMoney();
        });
    });


}());
// #Serviço -> Necessário utilizar o name="serv_ref[]"

// Criando select personalizado para busca de valores

$(document).ready(function() {

    $(".check-run"). click(function() {
        if( $(this).prop( "checked") == true){
            console.log("flegado");
        } else {
            console.log("vazio");
        }
    })
})


// Mask CEP
function mask_cep(){
    var n_cep = document.getElementById("cep").value.length;

    if(n_cep == 5){
        document.getElementById("cep").value = document.getElementById("cep").value+ "-";
    }
}

// Mask Horário
function mask_hora(){
    var n_hora = document.getElementById("hora_id").value.length;

    if(n_hora == 2){
        document.getElementById("hora_id").value = document.getElementById("hora_id").value+ ":";
    }
}

// Mask Fone
function mask_fone(){
    const n_fone = document.getElementById("txtFone").value.length;

    if(n_fone == 2){
        document.getElementById("txtFone").value = "(" +document.getElementById("txtFone").value+ ")"+" ";
    }
    else if(n_fone == 10){
        document.getElementById("txtFone").value = document.getElementById("txtFone").value+ "-";
    }
}

// Mask Fone 2
function mask_fone2(){
    const n_fone = document.getElementById("txtFone2").value.length;

    if(n_fone == 2){
        document.getElementById("txtFone2").value = "(" +document.getElementById("txtFone2").value+ ")"+" ";
    }
    else if(n_fone == 10){
        document.getElementById("txtFone2").value = document.getElementById("txtFone2").value+ "-";
    }
}

// Mask CPF
function mask_cpf(){
    var n_cpf = document.getElementById("txtCpf").value.length;

    if(n_cpf == 3) {
       document.getElementById("txtCpf").value = document.getElementById("txtCpf").value+ "."
    }
    else if(n_cpf == 7) {
        document.getElementById("txtCpf").value = document.getElementById("txtCpf").value+ "."
     }
     else if(n_cpf == 11) {
        document.getElementById("txtCpf").value = document.getElementById("txtCpf").value+ "-"
     }
}

// Mask WhatsApp
function mask_whats(){
    const n_whats = document.getElementById("txtWhats").value.length;

    if(n_whats == 2){
        document.getElementById("txtWhats").value = "(" +document.getElementById("txtWhats").value+ ")"+" ";
    }
    else if(n_whats == 10){
        document.getElementById("txtWhats").value = document.getElementById("txtWhats").value+ "-";
    }
}

// Mask CPF
function mask_cnpj(){
    const n_cpf = document.getElementById("txtCnpj").value.length;

    if(n_cpf == 2) {
       document.getElementById("txtCnpj").value = document.getElementById("txtCnpj").value+ "."
    }
    else if(n_cpf == 6) {
        document.getElementById("txtCnpj").value = document.getElementById("txtCnpj").value+ "."
     }
     else if(n_cpf == 10) {
        document.getElementById("txtCnpj").value = document.getElementById("txtCnpj").value+ " / "
     }
     else if(n_cpf == 17) {
        document.getElementById("txtCnpj").value = document.getElementById("txtCnpj").value+ "-"
     }
}


// CEP
function limpa_formulário_cep() {
    //Limpa valores do formulário de cep.
    document.getElementById('street').value=("");
    document.getElementById('district').value=("");
    document.getElementById('city').value=("");
    document.getElementById('state').value=("");
}

function meu_callback(conteudo) {
if (!("erro" in conteudo)) {
    //Atualiza os campos com os valores.
    document.getElementById('street').value=(conteudo.logradouro);
    document.getElementById('district').value=(conteudo.bairro);
    document.getElementById('city').value=(conteudo.localidade);
    document.getElementById('state').value=(conteudo.uf);
} //end if.
else {
    //CEP não Encontrado.
    limpa_formulário_cep();
    alert("CEP não encontrado.");
}
}

function pesquisacep(valor) {

//Nova variável "cep" somente com dígitos.
var cep = valor.replace(/\D/g, '');

//Verifica se campo cep possui valor informado.
if (cep != "") {

    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;

    //Valida o formato do CEP.
    if(validacep.test(cep)) {

        //Preenche os campos com "..." enquanto consulta webservice.
        document.getElementById('street').value="...";
        document.getElementById('district').value="...";
        document.getElementById('city').value="...";
        document.getElementById('state').value="...";

        //Cria um elemento javascript.
        var script = document.createElement('script');

        //Sincroniza com o callback.
        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

        //Insere script no documento e carrega o conteúdo.
        document.body.appendChild(script);

    } //end if.
    else {
        //cep é inválido.
        limpa_formulário_cep();
        alert("Formato de CEP inválido.");
    }
} //end if.
else {
    //cep sem valor, limpa formulário.
    limpa_formulário_cep();
    }
};

// Customer

function apelidoDisplay() {
    document.getElementById("apelido").value = document.getElementById("nome").value.slice(0,13);
}
