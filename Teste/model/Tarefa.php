<?php

    class Tarefa
    {
        //Atributos - Características - Elementos BD
        private $id;
        private $titulo;
        private $descricao;
        private $data;
        
        //Getters & Setters
        public function getId()
        {
            return $this->id;
        }
        
        public function setId($n)
        {
            $this->id = $n;
        }
        
        public function getTitulo()
        {
            return $this->titulo;
        }
        
        public function setTitulo($n)
        {
            $this->titulo = $n;
        }

        public function getDescricao()
        {
            return $this->descricao;
        }

        public function setDescricao()
        {
            $this->descricao = $n;
        }

        public function getData()
        {
            return $this->data;
        }

        public function setData()
        {
            return $this->data = $n;
        }
        
        //Create
        public function create()
        {
            //Tente Executar
            try
            {
                //Conectar ao BD
            include('Database.php');
            
            //Definir a ação
            $sql = 'INSERT INTO tarefa (titulo, id, descricao, data) VALUES (?, ?, ?, ?)';
            //Preparar a ação no BD
            $stmtInserir = $conexao->prepare($sql);
            //Definir o valor dos parâmetros
            $stmtInserir->bindParam(1, $this->titulo);
            $stmtInserir->bindParam(2, $this->id);
            $stmtInserir->bindParam(3, $this->descricao);
            $stmtInserir->bindParam(4, $this->data);
            //Executar ação no BD
            $stmtInserir->execute();
            }
            catch(PDOException $e)
            {
                echo 'Erro: ' . $e->getMessage();
            }
        
        }
        
        //Read
        public function read()
        {
            //Tente Executar
            try
            {
                include('Database.php');
            
            $sql = 'SELECT * FROM tarefa WHERE id = ?, titulo = ?, descricao = ?, data = ?';
            $stmtLeitura = $conexao->prepare($sql);
            $stmtLeitura->bindParam(1, $this->id);
            $stmtLeitura->execute();
            
            //Converter retorno para variável
            $dado = $stmtLeitura->fetch(PDO::FETCH_ASSOC);
            $this->titulo = $dado['titulo'];
            }
             catch(PDOException $e)
            {
                echo 'Erro: ' . $e->getMessage();
            }
        }
        
        //Update
        public function update()
        {
            try
            {
                include('Database.php');
            
            $sql = 'UPDATE tarefa SET titulo = ?, descricao = ?, data = ?';
            $stmtAtualizar = $conexao->prepare($sql);
            $stmtAtualizar->bindParam(1, $this->titulo);
            $stmtAtualizar->bindParam(2, $this->id);
            $stmtAtualizar->bindParam(3, $this->descricao);
            $stmtAtualizar->bindParam(4, $this->data);
            $stmtAtualizar->execute();
            }
            catch(PDOException $e)
            {
                echo 'Erro: ' . $e->getMessage();
            }
        }
        
        //Delete
        public function delete()
        {
            try
            {
                include('Database.php');
                
            $sql = 'DELETE FROM tarefa WHERE id = ?';
            $stmtDeletar = $conexao->prepare($sql);
            $stmtDeletar->bindParam(1, $this->id);
            $stmtDeletar->execute();
            }
            catch(PDOException $e)
            {
                echo 'Erro: ' . $e->getMessage();
            }
        }
        
        //Listagem
        public function lista()
            {
            try
            {
                include('Database.php');
            
            $sql = 'SELECT * FROM tarefa';
            $stmtLista = $conexao->prepare($sql);
            $stmtLista->execute();
                
            $alunos = $stmtLista->fetchAll(PDO::FETCH_ASSOC);
            return $alunos;
                
            }
            catch(PDOException $e)
            {
                echo 'Erro: ' . $e->getMessage();
            }
        }
        
        //JSON
        public function listaJson()
        {
            return json_encode($this->lista());
        }
        
        
    }

?>