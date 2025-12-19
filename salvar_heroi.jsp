<%@ page import="java.sql.*" %>
<%@ include file="conexao.jsp" %>
<%
    request.setCharacterEncoding("UTF-8");
    
    String nome = request.getParameter("nome");
    String classe = request.getParameter("classe");
    int nivel = Integer.parseInt(request.getParameter("nivel"));

    if (conexao != null) {
        String sql = "INSERT INTO aquiles_rpg.herois (nome, classe, nivel) VALUES (?, ?, ?)";
        PreparedStatement stmt = conexao.prepareStatement(sql);
        stmt.setString(1, nome);
        stmt.setString(2, classe);
        stmt.setInt(3, nivel);
        stmt.execute();
    }
    
    response.sendRedirect("herois.jsp");
%>