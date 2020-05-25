let fieldConta = document.querySelector('.field-conta');
let btnSearch = document.querySelector('.btn-search');
let textSaldo = document.querySelector('.text-saldo');
let btnDepositar = document.querySelector('.btn-depositar');
let btnSacar = document.querySelector('.btn-sacar');
let textAmount = document.querySelector('.text-amount');
let btnConfirm = document.querySelector('.btn-confirm');
let firstContent = document.querySelector('.first-content');
let secondContent = document.querySelector('.second-content');

let confirmAction = "";

btnSearch.addEventListener('click', function()
{
    let numero_conta = fieldConta.value;
    let labelError = firstContent.querySelector('.label-error');
    let blockError = firstContent.querySelector('.block-error');

    if(numero_conta === "" || parseInt(numero_conta) === 0)
    {
        labelError.style.display = "block";
        blockError.style.display = "block";
        return;
    }


    $.post('/graphql', {query:`
        query {
            saldo(numero_conta: ${numero_conta})
        }`
    })
    .done(function (response)
    {
        if (response.errors)
        {
            labelError.textContent = response.errors[0].extensions.validation.numero_conta[0];
            labelError.style.display = "block";
            blockError.style.display = "block";
        }
        else
        {
            labelError.style.display = "none";
            blockError.style.display = "none";
            setSaldo(response.data.saldo);
        }
    });
});

btnDepositar.addEventListener('click', function ()
{
    let numero_conta = fieldConta.value;
    let saldo = textSaldo.value;
    if(saldo === "" || numero_conta === "") return;
    firstContent.style.display = "none";
    secondContent.style.display = "flex";
    confirmAction = "deposit";
});

btnSacar.addEventListener('click', function ()
{
    let numero_conta = fieldConta.value;
    let saldo = textSaldo.value;
    if(saldo === "" || numero_conta === "") return;
    firstContent.style.display = "none";
    secondContent.style.display = "flex";
    confirmAction = "withdraw";
});

btnConfirm.addEventListener('click', function()
{
    let amount = textAmount.value;
    let labelError = secondContent.querySelector('.label-error');

    if(amount === "")
    {
        labelError.style.display = "block";
        return;
    };
    if (confirmAction === "deposit")
    {
        depositar();
    }
    else if (confirmAction === "withdraw")
    {
        sacar();
    }
});

function depositar()
{
    let numero_conta = fieldConta.value;
    let amount = textAmount.value.replace(',','.');
    let labelError = secondContent.querySelector('.label-error');

    $.post('/graphql', {query:`
        mutation {
            depositar(numero_conta: ${numero_conta}, valor: ${amount}) {
            numero_conta
            saldo
            }
        }`
    })
    .done(function (response)
    {
        if (response.errors)
        {
            labelError.textContent = response.errors[0].extensions.validation.valor[0];
            labelError.style.display = "block";
        }
        else
        {
            labelError.style.display = "none";
            firstContent.style.display = "flex";
            secondContent.style.display = "none";
            textAmount.value = "";
            setSaldo(response.data.depositar.saldo);
        }
    });
}

function sacar()
{
    let numero_conta = fieldConta.value;
    let amount = textAmount.value.replace(',','.');
    $.post('/graphql', {query:`
        mutation {
            sacar(numero_conta: ${numero_conta}, valor: ${amount}) {
            numero_conta
            saldo
            }
        }`
    })
    .done(function (response)
    {
        let labelError = secondContent.querySelector('.label-error');

        if (response.errors)
        {
            labelError.textContent = response.errors[0].extensions.validation.valor[0];
            labelError.style.display = "block";
        }
        else
        {
            labelError.style.display = "none";
            firstContent.style.display = "flex";
            secondContent.style.display = "none";
            textAmount.value = "";
            setSaldo(response.data.sacar.saldo);
        }
    });
}

function setSaldo(value)
{
    textSaldo.value = value.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
}
