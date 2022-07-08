public class Help
{
public static void main(String... args)
{
Help t = new Help();
t.m1('n');
t.m1("hello");

}
public void m1(int x){
System.out.println(x);
}
public void m1(String s){
System.out.println(s);
}
}