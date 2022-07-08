import java.util.Scanner;
public class OddEven
{
public static void main(String[] args)
{
int x,y;
System.out.println("Enter two number for Odd or Even :");
Scanner sc=new Scanner(System.in);
x=sc.nextInt();
y=sc.nextInt();
if(x%2)
{
System.out.println("The numeber is Even :"+x);
}
else
{
System.out.println("The number is Odd :"+y);
}
}
}