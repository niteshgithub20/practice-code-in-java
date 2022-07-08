import java.util.Scanner;
public class VowlCons
{
public static void main(String[] args)
{
char alpha;
System.out.println("Enetr the Alphabet:");
Scanner sc=new Scanner(System.in);
alpha=sc.next().charAt(0);
if(alpha == 'a' || alpha == 'e' || alpha == 'i' || alpha == 'o' || alpha == 'u')
System.out.println("It is vowels: "+alpha);
else
System.out.println("It is consonent: "+alpha);
}
}