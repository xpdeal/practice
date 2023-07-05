/**
 * Handles the behavior of the top menu.
 * @param {type} None - No parameters needed.
 * @return {type} None - No return value.
 */
function handleTopMenu() {
    const topMenu = $('.top-menu');
    var items = topMenu.find('.nav-item').length;
    if (topMenu.length > 0) {
        if (items > 3) {
            topMenu.attr('data-items', items);
        }
        $(window).scroll(function () {
            const scroll = $(window).scrollTop();
            if (scroll > 120 && !topMenu.hasClass('fixed')) {
                topMenu.addClass('fixed');                
            } else if (scroll <= 120) {
                topMenu.removeClass('fixed');topMenu.removeClass('fixed');
                // // Definir altura baseado no número de linhas
                const lineHeight = parseInt(topMenu.css('line-height'));
                const numLines = Math.ceil(topMenu.height() / lineHeight);
                const height = numLines * lineHeight;
                topMenu.css('height', height + 'px');
                
            }
        });
    }
    if (topMenu.find('.active-link').length > 0) {
        topMenu.animate({
            scrollLeft:topMenu.find('.active-link').offset().left - 15
        }, 200);
    }
}

/** Definição Bito
O código é uma função JavaScript chamada handleTopMenu(). Ele executa várias ações 
relacionadas a um menu superior em uma página da web.
1. Ele seleciona o elemento do menu superior usando o nome de classe '.top-menu'.
2. Ele conta o número de itens no menu superior usando o nome de classe '.nav-item'.
3. Se o elemento do menu superior existir, ele verifica se o número de itens é maior que 3.
4. Se o número de itens for maior que 3, ele adiciona um atributo customizado 'data-items' 
    ao elemento do menu superior com o valor do número de itens.
5. Ele adiciona um ouvinte de evento de rolagem ao objeto de janela.
6. Dentro do ouvinte do evento scroll, ele obtém a posição de rolagem atual usando 
    $(window).scrollTop().
7. Se a posição de rolagem for maior que 120 e o elemento do menu superior não tiver a classe 'fixed', 
    ele adiciona a classe 'fixed' ao elemento do menu superior.
8. Se a posição de rolagem for menor ou igual a 120, ele remove a classe 'fixed' do elemento de menu 
    superior e executa ações adicionais.
9. Dentro do bloco else if, calcula a altura do menu superior com base no número de linhas que ocupa.
10. Obtém a altura da linha do menu superior usando parseInt(topMenu.css('line-height')).
11. Ele calcula o número de linhas dividindo a altura do menu superior pela altura da linha e 
    arredondando para cima usando Math.ceil().
12. Calcula a nova altura do menu superior multiplicando o número de linhas pela altura da linha.
13. Ele define a nova altura do menu superior usando topMenu.css('height', height + 'px').
14. Se o menu superior contém um elemento com a classe 'link-ativo', ele anima a posição de rolagem 
    do menu superior à esquerda do elemento 'link-ativo' menos 15 pixels.
15. A animação leva 200 milissegundos para ser concluída.
No geral, o código lida com o comportamento do menu superior em uma página da Web, incluindo fixá-lo 
na parte superior da tela durante a rolagem, ajustando sua altura com base no número de linhas que 
ocupa e animando a posição de rolagem para mostrar o link ativo.

*/

/**
Este trecho de código define uma função chamada handleTopMenu que manipula o comportamento de um menu superior. Não recebe parâmetros e não tem valor de retorno. A função executa as seguintes tarefas:

Ele seleciona o elemento do menu superior usando a classe CSS .top-menu.
Determina o número de itens no menu superior.
Se o menu superior existir e tiver mais de 3 itens, ele definirá um atributo de itens de dados no elemento do menu superior.
Ele anexa um ouvinte de evento de rolagem ao objeto de janela.
Quando o usuário rola, ele verifica a posição de rolagem e adiciona ou remove a classe CSS fixada no elemento do menu superior com base na posição de rolagem.
Se a posição de rolagem for menor ou igual a 120, ele remove a classe fixa e ajusta a altura do menu superior com base no número de linhas de texto que ele contém.
Se o menu superior contém um elemento com a classe CSS .active-link, ele anima a posição de rolagem do menu superior para exibir o link ativo.
*/