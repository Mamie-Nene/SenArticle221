package webService;
import com.sun.tools.javac.util.List;
import metier.User;

import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebService;
import java.sql.*;
import java.util.ArrayList;
import java.sql.Date;

@WebService(serviceName = "userWebservice")
public class UserManager {
    public UserManager(){}
    @WebMethod(operationName = "addingUser")
    public int addUser(@WebParam(name="user") User user){
        String jdbcUrl="jdbc:mysql://localhost:3306/administration";
        String username="root";
        String password="passer1234";
        try {

            Connection connection= DriverManager.getConnection(jdbcUrl,username,password);
            if (connection!=null ){
                System.out.println("Connected");
                String sql="INSERT INTO users (prenom,nom,mail,mdp,sexe) VALUES (?,?,?,?,?)";
                PreparedStatement statement = connection.prepareStatement(sql);
                statement.setString(1,user.getPrenom());
                statement.setString(2,user.getNom());
                statement.setString(3,user.getMail());
                statement.setString(4, user.getMdp());
                statement.setString(5, user.getSexe());




                int rows =statement.executeUpdate();
                if (rows>0){
                    System.out.println("ADD");
                    connection.close();
                    return 1;
                }else{
                   System.out.println("not ADDED");
                   return 0;
                }


            }
        } catch (SQLException ex) {
            ex.printStackTrace();

        }
return 0;
    }
    @WebMethod(operationName = "updateUser")
    public int updateUser(@WebParam(name = "mail") String mail,@WebParam(name ="user") User user){
        String jdbcUrl="jdbc:mysql://localhost:3306/administration";
        String username="root";
        String password="passer1234";
        int isOK=1;
        try {

            Connection connection= DriverManager.getConnection(jdbcUrl,username,password);
            if (connection!=null ){
                System.out.println("Connected");
                String sql="UPDATE users SET prenom=?,nom=?,mail=?, mdp=? WHERE mail=?";
                PreparedStatement st=connection.prepareStatement(sql);
                st.setString(1,user.getPrenom());
                st.setString(2,user.getNom());
                st.setString(3,user.getMail());
                st.setString(4,user.getMdp());
                st.setString(5,mail);
                int rows =st.executeUpdate();
                if (rows>0){
                    System.out.println("update");
                    connection.close();
                }else{
                    System.out.println("not update");
                    isOK=0;
                }
                connection.close();

            }
        } catch (SQLException ex) {
            ex.printStackTrace();

        }
        return isOK;
    }
    @WebMethod(operationName = "listUser")
    public ArrayList<User> listerUser(){
        String jdbcUrl="jdbc:mysql://localhost:3306/administration";
        String username="root";
        String password="passer1234";
        ArrayList <User> users=new ArrayList<>();
        try {

            Connection connection= DriverManager.getConnection(jdbcUrl,username,password);
            if (connection!=null ){
                System.out.println("Connected");
                String sql="SELECT * FROM users";
                Statement statement=connection.createStatement();
                ResultSet result=statement.executeQuery(sql);
                while (result.next()){
                    String prenom=result.getString("prenom");
                    String nom=result.getString("nom");
                    String mail=result.getString("mail");
                    String sexe=result.getString("sexe");
                    String mdp=result.getString("mdp");
                    users.add(new User(prenom,nom,mail,null,sexe));
                   System.out.println(
                        "prenom=" + prenom + '\'' +
                                ", nom='" + nom + '\'' +
                                ", mail='" + mail + '\'' +
                                '}');

                }
                connection.close();

            }
        } catch (SQLException ex) {
            ex.printStackTrace();

        }
        System.out.println(users);
        return users;
    }
    @WebMethod(operationName = "deleteUser")
    public int deleteUser(@WebParam(name = "mail") String mail){
        String jdbcUrl="jdbc:mysql://localhost:3306/administration";
        String username="root";
        String password="passer1234";
        int isOK=1;
        try {

            Connection connection= DriverManager.getConnection(jdbcUrl,username,password);
            if (connection!=null ){
                System.out.println("Connected");
                String sql="DELETE FROM users WHERE mail=?";
                PreparedStatement st=connection.prepareStatement(sql);
                st.setString(1,mail) ;
                int rows =st.executeUpdate();
                if (rows>0){
                    System.out.println("deleted");
                    connection.close();
                }else{
                    isOK=0;
                    System.out.println("not deleted");
                }
                connection.close();

            }
        } catch (SQLException ex) {
            ex.printStackTrace();

        }
        return isOK;
    }
    @WebMethod(operationName = "login")
    public int login(@WebParam(name="mail") String mail,@WebParam(name = "password") String mdp){
        String jdbcUrl="jdbc:mysql://localhost:3306/administration";
        String username="root";
        String password="passer1234";
        try {

            Connection connection= DriverManager.getConnection(jdbcUrl,username,password);
            if (connection!=null ){
                System.out.println("Connected");
                String sql="SELECT mail,mdp FROM users where mail=?";

                PreparedStatement st=connection.prepareStatement(sql);
                st.setString(1,mail);
                ResultSet result=st.executeQuery();
                if  (result.next()){
                    System.out.println(result.getString("mdp"));
                    String mdp1=result.getString("mdp");
                    System.out.println(mdp1);
                    System.out.println(mdp);
                    if (mdp1.equals(mdp)){

                       System.out.println("success login");
                       return 1;
                   }else{
                       System.out.println("failed login");
                       return 0;
                   }

                }
                else{
                    System.out.println("failed login");
                    return 0;
                }

            }
        } catch (SQLException ex) {
            ex.printStackTrace();

        }
        return 0;
    }
    public static void main(String[] args) {
        String nom = "SOW";
        String prenom = "ABDOU";
        String mail = "abcd97@gmail.com";
        String mdp = "passer1235";
        java.util.Date utilDate = new java.util.Date();
        Date date= new Date(utilDate.getTime());
        String sexe="M";

        User[] user;
        UserManager manage=new UserManager();
        user=manage.listerUser().toArray(new User[0]);
System.out.println(user[0]);
    }

}
