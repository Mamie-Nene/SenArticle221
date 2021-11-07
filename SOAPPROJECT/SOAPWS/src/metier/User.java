package metier;
import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlRootElement;
import javax.xml.bind.annotation.XmlTransient;
import java.sql.Date;
@XmlRootElement(name = "user")
@XmlAccessorType(XmlAccessType.FIELD)
public class User {
    private String prenom;
    private String nom;
    private String mail;
    private String mdp;
    private String sexe;
    public User(String prenom,String nom,String mail,String mdp,String sexe ){
        this.prenom=prenom;
        this.nom=nom;
        this.mail=mail;
        this.mdp=mdp;

        this.sexe=sexe;
    }


    public String getMail() {
        return mail;
    }

    public String getNom() {
        return nom;
    }

    public String getPrenom() {
        return prenom;
    }

    public String getMdp() {
        return mdp;
    }

    public void setMdp(String mdp) {
        this.mdp = mdp;
    }

    public String getSexe() {
        return sexe;
    }

    public void setSexe(String sexe) {
        this.sexe = sexe;
    }



    public void setMail(String mail) {
        this.mail = mail;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public void setPrenom(String prenom) {
        this.prenom = prenom;
    }
 public User(){}

    @Override
    public String toString() {
        return "User{" +
                "prenom='" + prenom + '\'' +
                ", nom='" + nom + '\'' +
                ", mail='" + mail + '\'' +
                ", mdp='" + mdp + '\'' +

                ", sexe='" + sexe + '\'' +
                '}';
    }
}
