import java.util.Scanner;
public class Add
{
public static void main(String[] args)
{
int x,y,sum,multi,subs;
System.out.println("Enter two number :");
Scanner sc=new Scanner(System.in);
x=sc.nextInt();
y=sc.nextInt();
sum=x+y;
multi=x*y;
subs=x-y;
System.out.println("Add of two number is :"+sum);
System.out.println("Multiplication of two number is :"+multi);
System.out.println("Substraction of two number is :"+subs);
}
}