<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post | Projeto para Web com PHP</title>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                    include 'includes/topo.php';
                    include 'includes/valida_login.php';
                ?>
            </div>
        </div>
        <div class="row" style="min-height:500px">
            <div class="col-md-12">
                <?php
                    include 'includes/menu.php';
                ?>
            </div>
            <div class="col-md-10" style="padding-top:50px;">
                <?php
                    include 'includes/funcoes.php';
                    include 'core/conexao_mysql.php';
                    include 'core/sql.php';
                    include 'core/mysql.php';

                    foreach($_GET as $indice => $dado){
                        $$indice = limparDados($dado);
                    }

                    if(!empty($id)){
                        $id = (int)$id;

                        $criterio =[
                            ['id','=', $id]
                        ];

                        $retorno = buscar(
                            'post',
                            ['*'],
                            $criterio
                        );

                        $entidade = $retorno[0];
                    }
                ?>

                <h2>Post</h2>
                <form method="POST" action="core/post_repositorio.php">
                    <input type="hidden" name="acao" 
                    value="<?php echo empty($id) ? 'insert' : 'update' ?>">

                    <input type="hidden" name="id" 
                    value="<?php echo $entidade['id'] ?? '' ?>">

                    <div class="from-group">
                        <label for="titulo">Título</label>
                        <input class="form-control" type="text"
                        require="required" id= "titulo" name="titulo"
                        value="<?php echo $entidade['titulo'] ?? '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="texto">Texto</label>
                        <textarea class="form-control" type="text" require="required" 
                        name="texto" id="texto" rows="5"><?php echo $entidade['texto'] ?? '' ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="texto">Postar em</label>
                        <?php
                            $data = (!empty($entidade['data_postagem']))?
                            explode(' ', $entidade['data_postagem'])[0]:'';
                            $hora = (!empty($entidade['data_postagem']))?
                            explode(' ',$entidade['data_postagem'])[1]:'';
                        ?>
                        <div class="row">
                            <div class="col-md-3">
                                <input class="form-control" type="date"
                                require="required"
                                id="data_postagem"
                                name="data_postagem"
                                value="<?php echo $data ?>">
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" type="time"
                                require="required"
                                id="hora_postagem"
                                name="hora_postagem"
                                value="<?php echo $hora ?>">
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-success" type="submit">
                                Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                include 'includes/rodape.php';
                ?>
            </div>
        </div>
    </div>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>