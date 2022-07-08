import java.util.Scanner;
public class Ascii
{
public static void main(String[] args)
{
System.out.println("Enter the character tofind the ASCII values:");
Scanner sc=new Scanner(System.in);
char ch=sc.next().charAt(0);
int ascii=ch;
System.out.println("The ascii value of " +ch+"is:"+ascii);
}
}
