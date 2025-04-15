import java.util.Scanner;

public class ValidacionIf {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        //Pido datos
        System.out.println("Ingresa tu nombre: ");
            String nombre = scanner.nextLine();

        System.out.println("Ingresa tu altura: ");
            double altura = scanner.nextDouble();

        System.out.println("Ingresa tu edad");
            int edad = scanner.nextInt();
        
        //Verificamos por medio de if

        if (edad >= 18) {
            System.out.println("Hola te llamas " + nombre + " mides "+ altura+ "metros tienes "+edad+" anios y eres mayor de edad.");
        } else if (edad >= 13 ) {
            System.out.println("Hola te llamas " + nombre + " mides "+ altura+ " metros tienes "+edad+" anios y eres un adolescente.");
        } else {
            System.out.println("Hola te llamas " + nombre + " mides "+ altura+ " metros tienes "+edad+" anios y eres un niño.");
        }
        
        scanner.close();
    }
}
