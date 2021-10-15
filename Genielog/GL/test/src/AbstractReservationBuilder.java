package reservation;

import voyage.Vol;
import java.util.Date;



abstract class AbstractReservationBuilder {

    protected Reservation reservation;

    public Reservation getReservation() {
        return reservation;
    }

    public void createNewReservation(int val, Date date) {
        reservation = new Reservation();
        reservation.setIdentifiant(val);
        
    }

    public abstract void buildReservationVol(Vol v, Passager p);

}
