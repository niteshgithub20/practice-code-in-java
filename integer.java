import java.util.Scanner;
public class integer
{
public static void main(String[] args)
{
Scanner reader=new Scanner(System.in);
System.out.println("Enter the number for int");
int number=reader.nextInt();
System.out.println("Enter the number for float");
float num=reader.nextFloat();
System.out.println("Entered int number is:"+number);
System.out.println("Entered float number is:"+num);
}
}