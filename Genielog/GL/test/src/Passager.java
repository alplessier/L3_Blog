package reservation;


public class Passager {


    private String nom;

    public Passager() {
    }

    public Passager(String nom) {
    	this.nom = nom;
    }


    private int testName() {
        if (this.nom == null)
            return 0 ;
        else
            return 1 ;
    }


    public String getNom() {
        if (testName() == 0)
                return "No Name"  ;
        else
                return this.nom;
    }

    public void setNom(String val) {
        this.nom = val;
    }
}

