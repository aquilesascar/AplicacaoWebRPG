# 🐉 Taverna do Dragão - Sistema de Gestão de Guilda

> Uma aplicação WEB para gerenciamento de Aventureiros e Missões em um cenário de RPG medieval.

## 📋 Sobre o Projeto
Este projeto foi desenvolvido como requisito avaliativo para a disciplina de Desenvolvimento Web do curso de Sistemas de Informação (IFMG). O objetivo é demonstrar a aplicação dos conceitos de **CRUD** (Create, Read, Update, Delete) utilizando tecnologias web tradicionais e conexão com banco de dados relacional.

A aplicação simula o sistema administrativo de uma guilda, permitindo:
- Recrutar (cadastrar) novos heróis.
- Publicar (cadastrar) novas missões.
- Gerenciar (editar/excluir) registros existentes.

## 🚀 Tecnologias Utilizadas

* **Front-end:** HTML5, CSS3 (Estilização Temática), JavaScript (Validação).
* **Back-end:** PHP (Vanilla/Nativo).
* **Banco de Dados:** PostgreSQL (Acesso Remoto).
* **Conexão:** Biblioteca PDO (PHP Data Objects).
* **Servidor Web:** Apache (via XAMPP).

## ⚙️ Funcionalidades

### 🛡️ Módulo de Heróis
* **Cadastro:** Nome, Classe (Guerreiro, Mago, Ladino, Clérigo) e Nível.
* **Listagem:** Visualização tabular dos heróis ativos.
* **Edição:** Alteração de classe ou nível.
* **Exclusão:** Remoção de heróis (com confirmação via JS).

### 📜 Módulo de Missões
* **Cadastro:** Título, Recompensa em Ouro e Dificuldade.
* **Listagem:** Visualização das missões disponíveis.
* **Edição:** Ajuste de recompensas ou dificuldade.
* **Exclusão:** Cancelamento de missões.

---

## 🔧 Configuração e Instalação

### Pré-requisitos
* **XAMPP** instalado (com Apache e PHP).
* Acesso à internet (para conexão com o banco remoto).

### Passo a Passo

1.  **Clone ou Baixe** os arquivos deste projeto.
2.  Mova a pasta do projeto para o diretório padrão do servidor Apache:
    * Windows: `C:\xampp\htdocs\`
3.  **Habilite o Driver PostgreSQL no PHP:**
    * Abra o painel do XAMPP.
    * Clique em "Config" no Apache > `php.ini`.
    * Procure pela linha: `;extension=pdo_pgsql`.
    * Remova o ponto e vírgula (`;`) do início para descomentar.
    * Salve e **Reinicie o Apache**.
4.  **Configure o Banco de Dados:**
    * Abra o arquivo `conexao.php`.
    * Verifique a variável `$host`. Descomente o IP correto dependendo do local de acesso:
        ```php
        // $host = "10.90.24.54";   // Laboratório
        $host = "200.18.128.54"; // Casa
        ```
    * Insira seu usuário e senha nas variáveis `$user` e `$password`.

5.  **Acesse:**
    * Abra o navegador e digite: `http://localhost/AplicacaoWebRPG`

---

## 🗄️ Estrutura do Banco de Dados (SQL)

O sistema utiliza o esquema `aquiles_rpg` (ou o nome do seu usuário) dentro do banco `aula`.

```sql
-- Criação do Esquema
CREATE SCHEMA aquiles_rpg;

-- Tabela de Heróis
CREATE TABLE aquiles_rpg.herois (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    classe VARCHAR(50),
    nivel INT
);

-- Tabela de Missões
CREATE TABLE aquiles_rpg.missoes (
    id SERIAL PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    recompensa DECIMAL(10,2),
    dificuldade VARCHAR(20)
);