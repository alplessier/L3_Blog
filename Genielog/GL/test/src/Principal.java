package main;

import reservation.*;
import voyage.*;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.time.Duration;



	public class Principal {

		static ReservationBuilder builder;

	    public static void main(String[] args) {	        
	        builder = ReservationBuilder.getInstance();	
	 
	        Client client = new Client();
			  client.setReservationBuilder(builder);

			  SimpleDateFormat format = new SimpleDateFormat("dd/MM/yyyy hh:mm");
			  String dd = "22/10/2020 15:40";
			  
			  
	        client.setIdentifiant(10089);
	        client.setNom("toto");

	        VolFactory vf = VolFactory.getInstance();
			  Vol v = vf.create();
			  
	        v.setDepart("Paris");
	        v.setDestination("Tokyo");
	        
	        Passager p = new Passager("Untel");
	 
	        client.constructReservationVol(12, format.parse(dd), v, p);
	        Reservation reservation = client.getReservation(0);
	        reservation.affiche();
	    }

	}