import java.io.*;
import java.sql.*;
import jakarta.servlet.*;
import jakarta.servlet.http.*;
import jakarta.servlet.annotation.WebServlet;

@WebServlet("/books")
public class BookServlet extends HttpServlet {

    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        try {
            Class.forName("com.mysql.cj.jdbc.Driver");

            Connection con = DriverManager.getConnection(
                "jdbc:mysql://localhost:3306/ebookshop",
                "root",
                "te31104"
            );

            Statement stmt = con.createStatement();
            ResultSet rs = stmt.executeQuery("SELECT * FROM ebookshop");

            // HTML Start
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Book Table</title>");

            // CSS Styling
            out.println("<style>");
            out.println("body{font-family:Arial;text-align:center;background:#f2f2f2;}");
            out.println("table{border-collapse:collapse;margin:auto;width:70%;background:white;}");
            out.println("th,td{padding:10px;border:1px solid #ddd;}");
            out.println("th{background:#4CAF50;color:white;}");
            out.println("tr:nth-child(even){background:#f9f9f9;}");
            out.println("tr:hover{background:#ddd;}");
            out.println("</style>");

            out.println("</head>");
            out.println("<body>");

            out.println("<h2>Book Table</h2>");
            out.println("<table>");

            out.println("<tr>");
            out.println("<th>ID</th>");
            out.println("<th>Title</th>");
            out.println("<th>Author</th>");
            out.println("<th>Price</th>");
            out.println("<th>Quantity</th>");
            out.println("</tr>");

            while(rs.next()) {

                out.println("<tr>");
                out.println("<td>"+rs.getInt("book_id")+"</td>");
                out.println("<td>"+rs.getString("book_title")+"</td>");
                out.println("<td>"+rs.getString("book_author")+"</td>");
                out.println("<td>"+rs.getInt("book_price")+"</td>");
                out.println("<td>"+rs.getInt("quantity")+"</td>");
                out.println("</tr>");
            }

            out.println("</table>");
            out.println("</body>");
            out.println("</html>");

            con.close();

        } catch(Exception e) {
            out.println(e);
        }
    }
}