package murach.email;

import java.io.*;
import javax.servlet.*;
import javax.servlet.annotation.*;
import javax.servlet.http.*;

import murach.business.User;
import murach.data.UserDB;

@WebServlet(urlPatterns={"/emailList"}) 
public class EmailListServlet extends HttpServlet
{    
    @Override
    protected void doPost(HttpServletRequest request, 
                          HttpServletResponse response) 
                          throws ServletException, IOException {
        String url = "/index.html";
        
                   
            // get parameters from the request
            String firstName = request.getParameter("firstName");
            String lastName = request.getParameter("lastName");
            String email = request.getParameter("email");
            int age = Integer.parseInt(request.getParameter("age"));
            String city = request.getParameter("city");
            String state = request.getParameter("state");

            // use regular Java classes
            User user = new User(firstName, lastName, email, age, city, state);
            UserDB.insert(user);

            // store the User object in request and set URL
            request.setAttribute("user", user);
            url = "/thanks.jsp";
        
        // forward request and response objects
        getServletContext()
            .getRequestDispatcher(url)
            .forward(request, response);
    }    
    
    @Override
    protected void doGet(HttpServletRequest request, 
                          HttpServletResponse response) 
                          throws ServletException, IOException {
        
        String url = "/index.html";
        
        getServletContext()
            .getRequestDispatcher(url)
            .forward(request, response);
    }    
}