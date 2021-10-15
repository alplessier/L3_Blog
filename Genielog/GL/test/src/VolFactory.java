package voyage;


public class VolFactory extends AbstractVoyageFactory {
	private static VolFactory instance;

	private VolFactory() {
	}

	public Vol create() {
		return new VolImpl();		
	}
	
	public static VolFactory getInstance(){
		if (instance == null)
			instance = new VolFactory();
		return instance;
	}
}
