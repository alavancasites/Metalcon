// Register the related command.
FCKCommands.RegisterCommand( 'InserirIncorporador', new FCKDialogCommand( 'InserirIncorporador', 'Inserir Incorporador', FCKPlugins.Items['inseririncorporador'].Path + 'fck_incorporador.php', 450, 450 ) ) ;
// Create the "Plaholder" toolbar button.
var oInserirIncorporadorItem = new FCKToolbarButton( 'InserirIncorporador', FCKLang.InserirIncorporadorBtn ) ;
oInserirIncorporadorItem.IconPath = FCKPlugins.Items['inseririncorporador'].Path + 'icone.png' ;
FCKToolbarItems.RegisterItem( 'InserirIncorporador', oInserirIncorporadorItem ) ;
