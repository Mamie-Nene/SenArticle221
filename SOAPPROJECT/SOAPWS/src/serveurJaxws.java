import webService.UserManager;

import javax.xml.ws.Endpoint;

public class serveurJaxws {
    public static void main(String[] args) {
        String url="http://localhost:5000/";
        Endpoint.publish(url,new UserManager());
        System.out.println("service  deploye sur " +url);
    }
}
