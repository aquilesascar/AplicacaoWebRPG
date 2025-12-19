<%@ page contentType="text/html; charset=UTF-8" %>
<%@ include file="conexao.jsp" %>

<!DOCTYPE html>
<html>
<head>
    <title>Heróis da Guilda</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    
    <script>
        function validarHeroi() {
            var nome = document.getElementById("nome").value;
            var nivel = document.getElementById("nivel").value;
            
            if (nome.trim() == "") {
                alert("O herói precisa de um nome!");
                return false;
            }
            if (nivel < 1 || nivel > 100) {
                alert("O nível deve ser entre 1 e 100.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <a href="index.jsp">⬅ Voltar para a Taverna</a>
        <h2>🛡️ Recrutar Novo Herói</h2>
        
        <form action="salvar_heroi.jsp" method="post" onsubmit="return validarHeroi()">
            <input type="text" name="nome" id="nome" placeholder="Nome do Herói">
            
            <select name="classe">
                <option value="Guerreiro">Guerreiro</option>
                <option value="Mago">Mago</option>
                <option value="Ladino">Ladino</option>
                <option value="Clérigo">Clérigo</option>
            </select>
            
            <input type="number" name="nivel" id="nivel" placeholder="Nível (1-100)">
            
            <button type="submit">Cadastrar</button>
        </form>

        <hr>

        <h3>Membros Ativos</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Classe</th>
                <th>Nível</th>
            </tr>
            <%
                if (conexao != null) {
                    try {
                        String sql = "SELECT * FROM aquiles_rpg.herois ORDER BY id DESC";
                        PreparedStatement stmt = conexao.prepareStatement(sql);
                        ResultSet rs = stmt.executeQuery();

                        while(rs.next()) {
            %>
                <tr>
                    <td><%= rs.getInt("id") %></td>
                    <td><%= rs.getString("nome") %></td>
                    <td><%= rs.getString("classe") %></td>
                    <td><%= rs.getInt("nivel") %></td>
                </tr>
            <%
                        }
                    } catch (Exception e) {
                        out.println("<tr><td colspan='4'>Erro ao listar: " + e.getMessage() + "</td></tr>");
                    }
                } else {
                    out.println("<tr><td colspan='4' style='color:red'>" + mensagemErro + "</td></tr>");
                }
            %>
        </table>
    </div>
</body>
</html>