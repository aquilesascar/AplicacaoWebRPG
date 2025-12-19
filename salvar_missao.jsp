<%@ page import="java.sql.*" %>
<%@ include file="conexao.jsp" %>
<%
    request.setCharacterEncoding("UTF-8");
    
    String titulo = request.getParameter("titulo");
    double recompensa = Double.parseDouble(request.getParameter("recompensa"));
    String dificuldade = request.getParameter("dificuldade");

    if (conexao != null) {
        String sql = "INSERT INTO aquiles_rpg.missoes (titulo, recompensa, dificuldade) VALUES (?, ?, ?)";
        PreparedStatement stmt = conexao.prepareStatement(sql);
        stmt.setString(1, titulo);
        stmt.setDouble(2, recompensa);
        stmt.setString(3, dificuldade);
        stmt.execute();
    }
    
    response.sendRedirect("missoes.jsp");
%>