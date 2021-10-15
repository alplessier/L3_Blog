package reservation;

import voyage.*;
import java.util.Date;



public class Reservation {

    private int identifiant;
    private Date date;
    private Voyage voyage;
    private Passager passager;

    public Passager getPassager() {
        return passager;
    }

    public void setPassager(Passager passager) {
        this.passager = passager;
    }

    public Voyage getVoyage() {
        return voyage;
    }

    public void setVoyage(Voyage voyage) {
        this.voyage = voyage;
    }

    public int getIdentifiant() {
        return this.identifiant;
    }

    public void setIdentifiant(int val) {
        this.identifiant = val;
    }

    public Date getDate(){
        return this.date;
    }    

    public void setDate(Date date){
        this.date = date;
    }

    public void affiche() {
        System.out.println("Reservation : " + identifiant + date);
        System.out.println("Passager : " + passager.getNom());
        System.out.println("Voyage : " + voyage.getDepart() + "-"+ voyage.getDestination());
    }
}
