import java.util.Scanner;
public class OddEven
{
public static void main(String[] args)
{
Scanner reader=new Scanner(System.in);
System.out.println("Enter two number for Odd or Even :");
int num=reader.nextInt();
if(num % 2 == 0)
System.out.println("The numeber is Even :"+ num);
else
System.out.println("The number is Odd :"+ num);
}
}
