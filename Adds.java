import java.util.Scanner;
public class Adds
{
public static void main(String[] args)
{
int x,y,sum,multi,subs;
float j,k,add,mult,sub;
Scanner sc=new Scanner(System.in);
System.out.println("Enter the two int number for sum :");
x=sc.nextInt();
y=sc.nextInt();
sum=x+y;
System.out.println("Enter the two int number for multiplication :");
x=sc.nextInt();
y=sc.nextInt();
multi=x*y;
System.out.println("Enter the two int number for substraction"); 
x=sc.nextInt();
y=sc.nextInt();
subs=x-y;
System.out.println("Enter the two Float number for sum"); 
j=sc.nextFloat();
k=sc.nextFloat();
add=j+k;
System.out.println("Enter the two Float number for multiplication"); 
j=sc.nextFloat();
k=sc.nextFloat();
mult=j*k;
System.out.println("Enter the two Float number for substraction"); 
j=sc.nextFloat();
k=sc.nextFloat();
sub=j-k;
System.out.println("Sum of int number: "+sum);
System.out.println("Multiplication of int number: "+multi);
System.out.println("Substraction of int number: "+subs);
System.out.println("Sum of Float number: "+add);
System.out.println("Multiplication of Float number: "+mult);
System.out.println("Substraction of Float number: "+sub);
}
}