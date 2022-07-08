import java.util.Scanner;
public class QR
{
public static void main(String[] args)
{
int x,y,Quotient,Remainder;
System.out.println("Enter the two number for Quotient and Remainder :");
Scanner sc=new Scanner(System.in);
x=sc.nextInt();
y=sc.nextInt();
Quotient=x/y;
Remainder=x%y;
System.out.println("The Quotient is :"+Quotient);
System.out.println("The Remainder is :"+Remainder);
}
} 