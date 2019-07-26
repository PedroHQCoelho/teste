<?php

    //Se houver ação
    if( ! empty($_POST['action']))
    {
        $result ='';
        
        switch($_POST['action'])
        {
                
            case 'NOVA_TAREFA';
                //Adicionar Biblioteca
                include('../model/Tarefa.php');
                
                //Criar novo modelo de tarefa
                $novoTarefa = new Tarefa();
                //Define o valor do título
                $novoTarefa->setTitulo($_POST['titulo']);
                //Salva no BD
                $novoTarefa->create();
                //Resultado quer dizer que funcionou a ação
                $result = $_POST['action'];
                echo json_encode(array('result' => $result));
                break;
        
        case 'LISTA_TAREFAS';
                include('../model/Tarefa.php');
                $novoTarefa = new Tarefa();
                echo $novoTarefa->listaJson();
                break;
                
        case 'DELETA_TAREFA';
                include('../model/Tarefa.php');
                $novoTarefa = new Tarefa();
                $novoTarefa->setId($_POST['id']);
                $novoTarefa->delete();
                $result = $_POST['action'];
                echo json_encode(array('result' => $result));
                break;
                
        }
        
        
    }
    else
    {
        echo 'Não existe ação';
    }

?>