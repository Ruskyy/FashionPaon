<?php/**
  ->Estrutura
    -configuração da página backoffice
        -interface
            -painel do lado esquerdo
                -mudar cor
                -mudar imagem
                -mudar o nome
            -painel do lado cima
            -painel do lado baixo
            -base de dados
                -adicionar o que for preciso
        -Falta programar
            -Delete
                -Converter todas as querys que tenham delete para update ao estado para 1
                  (em vez de apagar logo dado ficar indisponivel se quiser pode depois por disponivel outra vez ou remover definitivamente)
                    -0 disponivel
                        -sempre que fizer um Insert
                    -1 indisponivel
                        -sempre que fizer um Delete
                -Criar um separado para todos os dados que o estado tenha valor 1 para gerir todos os dados da tabela que tenham o estado 1
                -Ter popup de confirmação para por indisponivel e depois se for para por disponivel ou eliminar definitivamente
            -Marca
                -CRUD
            -Listar informação
                -Search avançado
            -Produto
                -adicionar marca
                -Descontos(páginas(min.(2)), CRUD e descontos poderem associar ao produto)
                    -Base de dados
                        -criar pelo menos duas tabelas
                          -criação do desconto
                          -associar os produtos aos descontos
                -Stock
                    -editar, apagar e adicionar stock ao tamanho
                    -add quantidade «( seria método de encomenda popup com descrição, quantidade, oque que é encomenda, data e hora que foi feita (duração seria 10 min), estado(entregado-0, processar-1, cancelado-2 e perdido-3) )»
                      -tabela encomenda
                        -estado(0-processado, 1-processar, 2-cancelado)
                    -remove quantidade
                -Imagem
                    -editar e apagar
            -Cliente(maybe o Admin)
                -Historico dos carrinhos e compras
                    -possibilidade de gestão na compra ou historico
                -melhoria no css da página
            -Notificações
                -CRUD
                -ter notificações ou alerts no backoffice
            -Descontos
                -Tabelas
                  -Desconto
                    -ID, Nome, Descrição, Quantidade(%),
                    Género(ON(1)/OFF(0)),
                    Categoria(ON(1)/OFF(0)),
                    Marca(ON(1)/OFF(0)),
                  -ProdWDesc
                    -ID, ID_Produto, ID_Desconto, Desc_fim(data e hora que termina desconto)
      -configuração da página front office
          -fazer todo

          Tables_in_fashedot

*/?>
ad_encomendas
ad_notification
ad_tabelas
carrinho
carrinho_stock
categoria
cliente   ***<->***
desconto
imagem
imgcategoria
marca
marcas
mes
notify_content
paises
parallax
produto
publico
slider   ***<->***
slider_texteffects
stock
tamanho

<?php/**

*/?>
