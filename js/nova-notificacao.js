export async function notificacao()
{
    const xhr = new XMLHttpRequest();

    xhr.open("POST", "notificacao.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    return new Promise((resolve, reject) =>
    {
        xhr.onreadystatechange = function()
        {
            if(xhr.readyState === XMLHttpRequest.DONE)
            {
                if(xhr.status === 200)
                {
                    //console.log(xhr.responseText);
                    var resposta = JSON.parse(xhr.responseText);
                    try
                    {
                        if(resposta.length > 0)
                        {
                            var qtd = resposta.length;
                            resolve({existe: true, qtd: qtd});
                        }
                        else
                        {
                            resolve({existe: false, qtd: ''});

                            console.log("Não tem notificação :(");
                        }
                    }
                    catch(e)
                    {
                        console.error("Oooh deu erro :(", e);
                        reject(e);
                    }
                }
                else
                {
                    reject(new Error("Erro na requisição AJAX. Status: " + xhr.status));
                }
            }
        }
        xhr.send();
    });
}

export const divs = document.querySelectorAll(".sub-topicos-sininho-linha");
export const linkT = document.querySelectorAll(".sub-topicos-sininho-linha-titulo");
export const linkF = document.querySelectorAll(".sub-topicos-sininho-linha-frase");

export async function verificaNotificacao()
{
    const retornoNotificacao = await notificacao();

    if(retornoNotificacao.existe)
    {
        divs.forEach((div) =>
        {
            linkT.forEach((linkTitulo) =>
            {
                linkTitulo.addEventListener("click", function(event)
                {
                    event.preventDefault();
                    if(linkTitulo.id != "clicada")
                    {
                        linkTitulo.id = "clicada";
                    }
                    verificarTodasClicadas();
                    todasClicadas();
                });
            });
        });
    }
}


function verificarTodasClicadas()
{
    for(let i = 0; i < divs.length; i++)
    {
        const linkTitulo = linkT[i];

        if(linkTitulo.id != "clicada")
        {
            return false;
        }
    }
    return true;
}

function todasClicadas()
{
    var todosLinksClicados = verificarTodasClicadas();
    if(todosLinksClicados)
    {
        cliqueNotT();
        cliqueNotF();
    }
}




const bolinhaNot = document.querySelector(".nova-notificacao-bolinha");
export function verificarClasseBolinha()
{
    const classeArmazenada = localStorage.getItem("bolinha");

    if (classeArmazenada === "sem-bolinha")
    {
        bolinhaNot.classList.replace('nova-notificacao-bolinha', 'sem-bolinha');
    }
    else
    {
        bolinhaNot.classList.remove("sem-bolinha");
    }
}

function cliqueNotT()
{
    localStorage.setItem("bolinha", "sem-bolinha");
    bolinhaNot.classList.replace('nova-notificacao-bolinha', 'sem-bolinha');
}

function cliqueNotF()
{
    localStorage.setItem("bolinha", "sem-bolinha");
    bolinhaNot.classList.replace('nova-notificacao-bolinha', 'sem-bolinha');
}
