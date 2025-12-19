<%@ page import="java.sql.*" %>
<%
    Connection conexao = null;
    String mensagemErro = "";

    try {
        // Carrega o driver do PostgreSQL
        Class.forName("org.postgresql.Driver");

        // --- CONFIGURAÇÃO DOS IPs ---
        // Comente a linha que NÃO estiver usando
        
        // String ip = "10.90.24.54";   // LABORATÓRIO
        String ip = "200.18.128.54"; // CASA
        
        String banco = "aula";
        String url = "jdbc:postgresql://" + ip + ":5432/" + banco;
        
        // ATENÇÃO: Coloque seu usuário e senha reais aqui
        String usuario = "seu_usuario"; 
        String senha = "sua_senha";

        conexao = DriverManager.getConnection(url, usuario, senha);

    } catch (ClassNotFoundException e) {
        mensagemErro = "Driver não encontrado! Verifique o .jar na pasta lib.";
    } catch (SQLException e) {
        mensagemErro = "Erro ao conectar no banco: " + e.getMessage();
    }
%>