// Register the related command.
FCKCommands.RegisterCommand( 'InserirProduto', new FCKDialogCommand( 'InserirProduto', 'Inserir Incorporador', FCKPlugins.Items['inserirproduto'].Path + 'fck_produto.php', 450, 250 ) ) ;
// Create the "Plaholder" toolbar button.
var oInserirProdutoItem = new FCKToolbarButton( 'InserirProduto', FCKLang.InserirProdutoBtn ) ;
oInserirProdutoItem.IconPath = FCKPlugins.Items['inserirproduto'].Path + 'placeholder.gif' ;
FCKToolbarItems.RegisterItem( 'InserirProduto', oInserirProdutoItem ) ;
