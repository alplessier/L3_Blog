package voyage;

public class VolImpl implements Vol {

    private String destination;
    private String depart;

    public VolImpl() {
    }

    public VolImpl(String dep, String des) {
    	this.depart = dep;
    	this.destination = des;
    }

    public String getDepart() {
        return depart;
    }

    public void setDepart(String dep) {
        depart = dep;
    }

    public String getDestination() {
        return destination;
    }

    public void setDestination(String des) {
        destination = des;
    }
}

