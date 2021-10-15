package reservation;

import voyage.Vol;


public class ReservationBuilder extends AbstractReservationBuilder {

    private static ReservationBuilder instance;

    public void buildReservationVol(Vol v, Passager p) {
        reservation.setVoyage(v);
        reservation.setPassager(p);
    }


    public static ReservationBuilder getInstance() {
        if (instance == null) {
            instance = new ReservationBuilder();
        }
        return instance;
    }
}

