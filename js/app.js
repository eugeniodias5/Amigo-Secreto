function exibeModal(){
    $(document).ready(function(){
          $("#modal").modal();
      });
}

//Se um participante foi incluido corretamente, o endereço conterá '?sucesso' ao final e o modal de sucesso deve ser exibido
function envioCorretoDeDados(){
    let url = window.location.search
    if(url.includes('sucesso')){
        exibeModal()
        document.getElementById('tituloModal').innerHTML = 'Sucesso'
        document.getElementById('modalMensagem').innerHTML = 'O participante foi adicionado com sucesso'
        document.getElementById('botaoModal').className = 'btn btn-success'
    }

    if(url.includes('sucesso2')){
        //Exibe modal quando todo o processo é finalizado e os e-mails foram enviados aos participantes
        exibeModal()
        document.getElementById('tituloModal').innerHTML = 'Sucesso'
        document.getElementById('modalMensagem').innerHTML = 'O envio de e-mail para os participantes foi feito com sucesso! Bom jogo!'
        document.getElementById('botaoModal').className = 'btn btn-success'
    }

    else{ 
            if(url.includes('erro')){
                exibeModal()
                document.getElementById('tituloModal').innerHTML = 'Erro'
                document.getElementById('modalMensagem').innerHTML = 'O participante já existe'
                document.getElementById('botaoModal').className = 'btn btn-danger'
            }

            //Erro caso exista um número ímpar de participantes
            if(url.includes('erro2')){
                exibeModal()
                document.getElementById('tituloModal').innerHTML = 'Erro'
                document.getElementById('modalMensagem').innerHTML = 'É necessário um número par de participantes para realizar o sorteio'
                document.getElementById('botaoModal').className = 'btn btn-danger'
            }

            //Erro caso se tente fazer o sorteio sem participantes
            if(url.includes('erro3')){
                exibeModal()
                document.getElementById('tituloModal').innerHTML = 'Erro'
                document.getElementById('modalMensagem').innerHTML = 'Adicione participantes para realizar o sorteio'
                document.getElementById('botaoModal').className = 'btn btn-danger'
            }
        }
}


function validaFormulario(){
    //Script para exibir mensagens de erro, caso a inclusão do usuário esteja errada ao apertar o botão

    let validaFormulario = true

    let nomeErro = document.getElementById('nomeErro')
    let emailErro = document.getElementById('emailErro')

    let nomeInput = document.getElementById('nome')
    let emailInput = document.getElementById('email')                    

    let nomeValor = document.getElementById('nome').value
    let emailValor = document.getElementById('email').value

    if(!nomeValor){  //Nome não foi preenchido corretamente
        nomeInput.className = "form-control border border-danger"
        nomeErro.className = nomeErro.className.replace('invisible', '');
        validaFormulario = false
    }

    else{   //Nome foi preenchido corretamente
        nomeInput.className = "form-control" 
        if(!nomeErro.className.includes('invisible'))
            nomeErro.className += ' invisible'; 
    }

            //email não contém @ ou não foi preenchido, exibe mensagem de erro
    if(!emailValor || !emailValor.includes('@')){ 
        emailInput.className = "form-control border border-danger"
        emailErro.className = emailErro.className.replace('invisible', '');
        validaFormulario = false
    }

            //email preenchido corretamente
    else{
        emailInput.className = "form-control"
        if(!emailErro.className.includes('invisible'))
            emailErro.className += ' invisible';
    }

    console.log(nomeErro.className)


    return validaFormulario
}