# 🐉 Taverna do Dragão - Sistema de Gestão de Guilda (Laravel Edition)

> Uma aplicação WEB completa para gerenciamento de Aventureiros e Missões em um cenário de RPG medieval, migrada para arquitetura MVC moderna.

---

## 📖 Sobre o Projeto

Este projeto nasceu como uma aplicação em **PHP Nativo (Procedural)** para demonstrar conceitos de conexão com banco de dados e CRUD. Agora, ele foi evoluído para utilizar o framework **Laravel**, adotando os padrões de mercado para desenvolvimento web robusto.

A aplicação simula o sistema administrativo de uma guilda de aventureiros, permitindo ao "Mestre da Guilda":
- Recrutar (cadastrar) novos heróis.
- Gerenciar atributos (editar nível e classes).
- Publicar missões no quadro de avisos.
- Gerenciar recompensas e dificuldades.

### 🔄 A Evolução (De PHP Puro para MVC)
O projeto passou por uma refatoração completa para separar responsabilidades:
- **Antes:** Lógica de banco, HTML e regras de negócio misturadas em arquivos únicos (ex: `herois.php`).
- **Agora:** Arquitetura **MVC (Model-View-Controller)** organizada:
  - **Models:** Gerenciam a interação com o Banco de Dados (Eloquent ORM).
  - **Views:** Templates limpos usando a engine **Blade**.
  - **Controllers:** Gerenciam o fluxo de dados e validações.

---

## 🚀 Tecnologias e Ferramentas

* **Backend:** PHP 8.2+ com Framework **Laravel 11**.
* **Banco de Dados:** PostgreSQL (Conexão Remota via PDO/Eloquent).
* **Frontend:** HTML5, CSS3 (Estilização Temática RPG), JavaScript.
* **Gerenciador de Dependências:** Composer.
* **Servidor:** PHP Built-in Server (via Artisan).

---

## ⚙️ Funcionalidades Implementadas

### 🛡️ Módulo de Heróis
* **Listagem:** Visualização de todos os membros da guilda.
* **Cadastro:** Validação de campos (Nome obrigatório, Nível entre 1-100).
* **Edição:** Atualização de classe e nível.
* **Exclusão:** Remoção segura com confirmação via JavaScript e método HTTP DELETE.

### 📜 Módulo de Missões
* **Quadro de Avisos:** Listagem de missões ordenadas pela mais recente.
* **Publicação:** Definição de título, recompensa em ouro e dificuldade.
* **Gestão:** Edição de valores e cancelamento (exclusão) de missões.

---

## 🔧 Configuração e Instalação

Como este projeto utiliza Laravel, a instalação requer o **Composer** e alguns comandos de terminal.

### Pré-requisitos
* PHP instalado.
* Composer instalado.
* Git (opcional).
* Acesso ao banco de dados PostgreSQL.

### Passo a Passo

1.  **Clone ou Baixe** o projeto e acesse a pasta da aplicação Laravel:
    ```bash
    cd taverna-rpg
    ```

2.  **Instale as Dependências do Framework:**
    ```bash
    composer install
    ```

3.  **Configure o Ambiente:**
    * Copie o arquivo de exemplo de configuração:
        * Windows: `copy .env.example .env`
        * Linux/Mac: `cp .env.example .env`
    * Abra o arquivo `.env` e configure a conexão com o banco:
    ```ini
    DB_CONNECTION=pgsql
    DB_HOST=200.18.128.54
    DB_PORT=5432
    DB_DATABASE=aula
    DB_USERNAME=seu_usuario
    DB_PASSWORD=sua_senha
    DB_SCHEMA=aquiles_rpg  # Schema específico do projeto
    
    # Define driver de sessão como arquivo para evitar criar tabelas extras
    SESSION_DRIVER=file
    ```

4.  **Gere a Chave de Criptografia:**
    ```bash
    php artisan key:generate
    ```

5.  **Inicie o Servidor:**
    ```bash
    php artisan serve
    ```

6.  **Acesse a Aplicação:**
    Abra o navegador em: `http://127.0.0.1:8000`

---

### 📂 Organização do Código (MVC)

O código fonte principal encontra-se dentro da pasta `taverna-rpg`:

* 📂 **app/Models**:
    * `Heroi.php`: Mapeia a tabela `aquiles_rpg.herois`.
    * `Missao.php`: Mapeia a tabela `aquiles_rpg.missoes`.
* 📂 **app/Http/Controllers**:
    * `HeroiController.php`: Lógica de CRUD para heróis.
    * `MissaoController.php`: Lógica de CRUD para missões.
* 📂 **resources/views**:
    * Arquivos `.blade.php` contendo o HTML e a interface do usuário.
* 📂 **routes**:
    * `web.php`: Definição das rotas e URLs amigáveis.
      
---

## 🗄️ Estrutura do Banco de Dados

O projeto se conecta a um esquema existente (`aquiles_rpg`) com a seguinte estrutura:

```sql
-- Schema
CREATE SCHEMA IF NOT EXISTS aquiles_rpg;

-- Tabela de Heróis
CREATE TABLE aquiles_rpg.herois (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    classe VARCHAR(50),
    nivel INTEGER
);

-- Tabela de Missões
CREATE TABLE aquiles_rpg.missoes (
    id SERIAL PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    recompensa DECIMAL(10, 2),
    dificuldade VARCHAR(50)
);

---

## ✒️ Autor

**Desenvolvido por Aquiles**
*Disciplina de Desenvolvimento Web - IFMG*
