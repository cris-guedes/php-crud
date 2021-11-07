<?php 
require "./env.php";
 require "$ENV_DIR/src/template/header.php"; 
 require "$ENV_DIR/src/models/clienteDao.php";
 require "$ENV_DIR/src/pdo.php";

 if(isset($_GET['id'])){
    $clienteDao = new ClienteDao($pdo);
    $result = $clienteDao->findById($_GET['id']);
    
    
 }


 

?>

<header class="display-2 headerCadastro">Atualizar </header>
<?php if (isset($_GET['status']) && $_GET['status'] == true) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Atualização Feita Com Successo!</strong><a href=<?= "$ENV_URL_REQUEST/index.php"?> class="alert-link"> Volte para A pagina Principal</a>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php endif; ?>
<?php if (isset($_GET['status']) && $_GET['status'] == false) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Erro ao fazer o upload O usuario Ja existe  !</strong><a href=<?= "$ENV_URL_REQUEST/index.php"?> class="alert-link"> Volte para A pagina Principal</a><span> ou Tente Outro cadastro  </span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php endif; ?>
<div class="formArea">
    <form class="row g-3" method="POST" action="./src/actions/update.php" >
        <div class="col-md-4">
            <label for="inputNome" class="form-label">Nome</label>
            <input required type="text" value=<?= $result['nome']?>   name="nome"class="form-control" id="inputNome">
            <input type="hidden" name="id" value=<?= $result['id']?> />
        </div>
        <div class="col-md-4">
            <label for="inputCpf" class="form-label">Cpf</label>
            <input required type="text" value=<?= $result['cpf']?> name="cpf" class="form-control" id="inputCpf">
        </div>
        <div class="col-4">
            <label for="inputNascimento"  class="form-label">Nascimento</label>
            <input required type="date" value=<?= $result['nascimento']?> name="nascimento" class="form-control" id="inputNascimento" >
        </div>
        <div class="col-6">
            <label for="inputEndereco" class="form-label">Endereço</label>
            <input required type="text" value=<?= $result['endereco']?> name="endereco" class="form-control" id="inputEndereco" >
        </div>
        <div class="col-md-6">
            <label for="inputBairro" class="form-label">Bairro</label>
            <input required type="text" value=<?= $result['bairro']?> name="bairro" class="form-control" id="inputBairro">
        </div>
        <div class="col-md-6">
            <label for="inputCep" class="form-label">Cep</label>
            <input required type="text" value=<?= $result['cep']?> name="cep" class="form-control" id="inputCep">
        </div>
        <div class="col-md-6">
            <label for="inputUnidadeConsumidora" class="form-label">Unidade Consumidora</label>
            <input required type="number" value=<?= $result['unidade_consumidora']?>  name="unidade_consumidora" class="form-control" id="inputUnidadeConsumidora">
        </div>
       
        <div class="col-md-4">
            <label for="inputDataVencimento" class="form-label">Data Vencimento</label>
            <input required type="date" value=<?= $result['data_vencimento']?> name="data_vencimento" class="form-control" id="inputDataVencimento">
        </div>
       
      
        <div class="col-md-8">
            <label for="inputConsumo" class="form-label">Consumo</label>
            <input required type="number" value=<?= $result['kwh']?>  name="kwh" class="form-control" id="inputConsumo">
        </div>
        <div class="col-md-12">
            <label for="inputTotalPagar" class="form-label">Total Pagar</label>
            <input required type="number" value=<?= $result['valor_total']?> name="valor_total" class="form-control" id="inputTotalPagar">
        </div>
        <div class="col-10">
            <div class="form-radio">
                <input required class="form-radio-input"name="sexo" <?php  echo($result['sexo']=="masculino")?'checked="checked"':'';?> value="masculino" type="radio" id="inputMasculino">
                <label class="form-radio-label"   for="inputMasculino">
                    Masculino
                </label>
            </div>
            <div class="form-radio">
                <input required class="form-radio-input" <?php echo($result['sexo']=="feminino")?'checked="checked"':'';?> name="sexo" value="feminino" type="radio" id="inputFeminino">
                <label class="form-radio-label" for="inputFeminino">
                    Feminino
                </label>
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </form>
</div>
<?php require "$ENV_DIR/src/template/footer.php" ?>