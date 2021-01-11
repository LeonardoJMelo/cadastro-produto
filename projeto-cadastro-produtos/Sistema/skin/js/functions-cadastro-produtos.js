$(document).ready(function(){
  $("#FORM_CADASTRO_PRODUTO").submit(function(){
  $.ajax({
        type: 'POST',
        url: 'http://localhost/projeto-cadastro-produtos/sistema/controller/produtos/CadastroProduto.php',
        data:{
          'COD_PRODUTO': $('#COD_PRODUTO').val(),
          'DESCRICAO': $('#DESCRICAO').val(),
          'QUANTIDADE': $('#QUANTIDADE').val(),
          'PRECO': $('#PRECO').val()
        },
        success: function(data){            
        },
        error: function(data){
        }
	});
  return false;
  });
});