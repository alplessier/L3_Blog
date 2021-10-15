package reservation;

import java.util.ArrayList;
import java.util.Date;

public class Client {

    private String nom;
    private int identifiant;
    private String ref;
    private String numeroTel;
    private ArrayList <Reservation> reservations = new ArrayList <Reservation>();
    private ReservationBuilder reservationBuilder;

    public ReservationBuilder getReservationBuilder() {
        return reservationBuilder;
    }

    public void setReservationBuilder(ReservationBuilder val) {
        this.reservationBuilder = val;
    }

    public int getIdentifiant() {
        return identifiant;
    }

    public void setIdentifiant(int val) {
        this.identifiant = val;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String val) {
        this.nom = val;
    }

    public String getRef(){
        return ref;
    }

    public void setRef(String ref){
        this.ref = ref;
    }

    public String getNumTel(){
        return numeroTel;
    }

    public void setNumTel(String numeroTel){
        this.numeroTel = numeroTel;
    }

    public void constructReservationVol(int numReservation, Date dateReservation, voyage.Vol v, Passager p) {
        reservationBuilder.createNewReservation(numReservation,dateReservation);
        reservationBuilder.buildReservationVol(v, p);
        reservations.add(reservationBuilder.getReservation());
    }


    public Reservation getReservation(int index) {
        return reservations.get(index);
    }
}

