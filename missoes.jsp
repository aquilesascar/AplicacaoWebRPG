<%@ page contentType="text/html; charset=UTF-8" %>
<%@ include file="conexao.jsp" %>

<!DOCTYPE html>
<html>
<head>
    <title>Quadro de Missões</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    
    <script>
        function validarMissao() {
            var titulo = document.getElementById("titulo").value;
            if (titulo.length < 5) {
                alert("Descreva melhor essa missão (mínimo 5 letras).");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <a href="index.jsp">⬅ Voltar para a Taverna</a>
        <h2>📜 Nova Missão Disponível</h2>
        
        <form action="salvar_missao.jsp" method="post" onsubmit="return validarMissao()">
            <input type="text" name="titulo" id="titulo" placeholder="Título da Missão" style="width: 300px;">
            
            <input type="number" step="0.01" name="recompensa" placeholder="Recompensa (Ouro)">
            
            <select name="dificuldade">
                <option value="Fácil">Fácil</option>
                <option value="Média">Média</option>
                <option value="Difícil">Difícil</option>
                <option value="Mortal">Mortal</option>
            </select>
            
            <button type="submit">Publicar Missão</button>
        </form>

        <hr>

        <h3>Quadro de Avisos</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Missão</th>
                <th>Recompensa ($)</th>
                <th>Dificuldade</th>
            </tr>
            <%
                if (conexao != null) {
                    try {
                        String sql = "SELECT * FROM aquiles_rpg.missoes ORDER BY id DESC";
                        PreparedStatement stmt = conexao.prepareStatement(sql);
                        ResultSet rs = stmt.executeQuery();

                        while(rs.next()) {
            %>
                <tr>
                    <td><%= rs.getInt("id") %></td>
                    <td><%= rs.getString("titulo") %></td>
                    <td><%= rs.getDouble("recompensa") %></td>
                    <td><%= rs.getString("dificuldade") %></td>
                </tr>
            <%
                        }
                    } catch (Exception e) {
                        out.println("<tr><td colspan='4'>Erro: " + e.getMessage() + "</td></tr>");
                    }
                }
            %>
        </table>
    </div>
</body>
</html>